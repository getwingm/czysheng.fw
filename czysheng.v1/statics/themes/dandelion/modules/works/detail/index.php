<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Taxonomy;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;



$title = $this->title = $row['title'];
if(isset($row['master'])){
    $title .= " - ".$row['master'];
}

if(isset($row['lang'])){
    $title .= " - ".$row['lang'];
}

function calc_line_count($txt){
    $value = explode("\r\n", $txt);
    $total = 0;
    foreach($value as $v){
        $v = trim($v);
        if(strlen($v) > 0){
            $total++;
        }
    }
    return $total;
}

$hadmp3 = calc_line_count($row->url);
if($hadmp3){
    $this->registerJsFile("/statics/themes/dandelion/basic/plugins/audiojs/audio.min.js",['position'=>1]);
    $this->registerCssFile("/statics/themes/dandelion/basic/plugins/audiojs/audiojs.css");
}

$hadcloud = calc_line_count($row->cloud);

?>
<div class="da-panel">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo Resource::getAdminUrl()?>/basic/images/icons/black/16/pencil.png" alt="">
            <?= $title ?>
        </span>
    </div>
    <div class="da-panel-content">
        <?php if($hadmp3){ ?>
        <audio></audio>
        <div class="playlist">
            <h5 class="title">播放列表</h5>
            <ul>
                <?php
                $urls = explode("\r\n", $row->url);
                for($idx = 0; $idx < count($urls); $idx++) {
                    $url = trim($urls[$idx]);
                    if(strlen($url) == 0){
                        continue;
                    }
                    echo '<li><a href="#" data-src="'.$url.'" target="_blank">'.($idx+1).'</a></li>';
                }
                ?>
            </ul>
        </div>
        <div style="height: 10px"></div>
        <div class="downlist">
            <div><span class="title">下载列表</span></div>
            <ul>
                <?php
                for($idx = 0; $idx < count($urls); $idx++) {
                    $url = trim($urls[$idx]);
                    if(strlen($url) == 0){
                        continue;
                    }
                    echo '<li><a href="'.$url.'" target="_blank">'.($idx+1).'</a></li>';
                }
                ?>
            </ul>
        </div>
        <?php } ?>
        <?php if($hadcloud) {?>
            <div style="padding:20px 20px 20px 20px">
                <h5><b>以下云盘资源,直接占击下载:</b></h5>
                <?php
                $urls = explode("\r\n", $row->cloud);
                for($idx = 0; $idx < count($urls); $idx++) {
                    $url = trim($urls[$idx]);
                    if(strlen($url) == 0){
                        continue;
                    }
                    $links = explode("|", $url, 2);
                    $first = trim($links[0]);
                    $second = "";
                    if(isset($links[1])){
                        $second = $links[1];
                    }
                    echo '<div><a href="'.$first.'" target="_blank">'.$first.'</a>'.$second.'</div>';
                }
                ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php if($hadmp3){ ?>
<script>
    audiojs.events.ready(function() {
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
            autoplay:true,
            preload:true,
            trackEnded: function() {
                var next = $('.playlist ul li.playing').next();
                if (!next.length) next = $('.playlist ul li').first();
                next.addClass('playing').siblings().removeClass('playing');
                audio.load($('a', next).attr('data-src'));
                audio.play();
            }
        });

        // Load in the first track
        var audio = a[0];
        first = $('.playlist ul a').attr('data-src');
        $('.playlist ul li').first().addClass('playing');
        audio.load(first);

        $('.playlist ul li').click(function(e) {
            e.preventDefault();
            $(this).addClass('playing').siblings().removeClass('playing');
            audio.load($('a', this).attr('data-src'));
            audio.play();
        });

        // Keyboard shortcuts
        $(document).keydown(function(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode;
            // right arrow
            if (unicode == 39) {
                var next = $('li.playing').next();
                if (!next.length) next = $('ol li').first();
                next.click();
                // back arrow
            } else if (unicode == 37) {
                var prev = $('li.playing').prev();
                if (!prev.length) prev = $('ol li').last();
                prev.click();
                // spacebar
            } else if (unicode == 32) {
                audio.playPause();
            }
        })
    });
</script>
<?php } ?>