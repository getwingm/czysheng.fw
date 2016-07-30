<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

$post = $row->post;
$body = $post['body'];
$myret = json_decode($body, true);
$urls = $myret['url'];
$author = '未知';
if(isset($myret['author'])){
   $author = $myret['author'];
}

$this->registerCss(".blocktext{text-decoration: underline; line-height: 30px; display: inline-block;width: 30px;height: 30px;}");
$this->registerCss(".wordwrap{word-wrap:break-word;padding-top: 6px}");
?>

<tr>
    <td>
        <div class="clearfix">
            <div class="grid_2 wordwrap">
                <?php echo Html::a($row['title'],$row['url'])?>
            </div>
            <div class="grid_1 wordwrap">
                <?php echo $author ?>
            </div>
            <div class="grid_1 wordwrap">
                <?php
                if(isset($row->taxonomy)):
                    $taxonomy = $row->taxonomy;
                    $name = $taxonomy->name;
                    ?>
                    <a href="<?php echo Url::to(['/'.$row['content_type'].'/lecture/list','taxonomy'=>$row->taxonomy['id']])?>" rel="category tag"><?php echo $row->taxonomy->name; ?></a>
                <?php endif;?>
            </div>
            <div class="grid_1 wordwrap">
                <?php echo Html::a('试听',$row['url']) ?>
            </div>
            <div class="grid_5"> <?php
                for($idx = 0; $idx < count($urls); $idx++) {
                    echo '<a href="'.$urls[$idx].'" target="_blank" class="blocktext">'.($idx+1).'</a>';
                }
                ?>
            </div>
        </div>

    </td>
</tr>