<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */


$taxonomies = $this->params['taxonomies'];
$masters = $this->params['masters'];
$master_id = $row['master'];
$master_name = null;
if(isset($masters[$master_id])){
    $master_name = $masters[$master_id]->name;
}
?>

<tr>
    <td>
        <div class="clearfix">
            <div class="grid_2 wordwrap">
                <?php echo Html::a($row['title'], '/index.php?r=sutra/detail&id='.$row['id'])?>
            </div>
            <div class="grid_1 wordwrap">
                <?php
                if ($master_name != null) {
                    echo Html::a($master_name, '/index.php?r=sutra/master&id='.$master_id);
                }
                ?>
            </div>
            <div class="grid_1 wordwrap">
                <?php
                if(isset($row['taxonomy'])){
                    $items = explode(',', $row->taxonomy);
                    foreach($items as $item) {
                        if(!isset($taxonomies[$item])){
                            continue;
                        }
                        $tax = $taxonomies[$item];
                    ?>
                    <a href="<?php echo Url::to(['/sutra','taxonomy'=>$tax->id])?>" rel="category tag"><?php echo $tax->name; ?></a>
                <?php }};?>
            </div>
            <div class="grid_1 wordwrap">
                <?php echo $row['lang'] ?>
            </div>
            <div class="grid_1 wordwrap">
                <?php echo Html::a('试听','/index.php?r=sutra/detail&id='.$row['id']) ?>
            </div>
            <div class="grid_4">
                <div><?php
                    $urls = explode("\r\n", $row->url);
                    for($idx = 0; $idx < count($urls); $idx++) {
                        $url = trim($urls[$idx]);
                        if(strlen($url) == 0){
                            continue;
                        }
                        echo '<a href="'.$url.'" target="_blank" class="blocktext">'.($idx+1).'</a>';
                    }?>
                </div>
                <div><?php
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
                        echo '<a href="'.$first.'" target="_blank" style="line-height: 30px">'.$first.'</a>'.$second;
                    }?>
                </div>
            </div>
        </div>

    </td>
</tr>
