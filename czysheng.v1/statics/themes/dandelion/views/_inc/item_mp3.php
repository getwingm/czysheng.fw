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
        <?php echo Html::a($row['title'],$row['url']) ?>
    </td>
    <td>
        <?php echo Html::a('试听',$row['url']) ?>
    </td>
    <td>
        <?php echo Html::a('下载',$row['url']) ?>
    </td>
<!--    <td>-->
<!--        <span>--><?php //echo $row['view_count'] ?><!--</span>-->
<!--    </td>-->
</tr>