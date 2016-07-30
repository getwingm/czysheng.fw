<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

?>

<tr>
    <td>
        <div class="clearfix">
            <div class="grid_8">
                <h2><?php echo Html::a($row['title'],$row['url'])?></h2>
            </div>
            <div class="grid_2" style="text-align: right">
                <?php echo Html::a('试听',$row['url']) ?>
            </div>
        </div>
        <div style="word-wrap:break-word;"> <?php
            $post = $row->post;
            $body = $post['body'];
            $myret = json_decode($body, true);
            $urls = $myret['url'];
            for($idx = 0; $idx < count($urls); $idx++) {
                echo '<a href="'.$urls[$idx].'" target="_blank" style="text-decoration:underline;">'.($idx+1).'</a>';
                echo "<span> </span>";
            }
            ?>
        </div>
        <div style="text-align: right">
            <?php
            if(isset($row->taxonomy)):
                $taxonomy = $row->taxonomy;
                $name = $taxonomy->name;
            ?>
            <a href="<?php echo Url::to(['/'.$row['content_type'].'/default/list','taxonomy'=>$row->taxonomy['id']])?>" rel="category tag"><?php echo $row->taxonomy->name; ?></a>
            <?php endif;?>
        </div>
    </td>
</tr>