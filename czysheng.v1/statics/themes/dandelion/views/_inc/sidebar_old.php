<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

use source\LuLu;

/* @var $this yii\web\View */

$controller = LuLu::$app->controller;
$controller_id = $controller->id;
$moduleId = $controller->module->id;
if($moduleId == "about"){
    return;
}
?>

<div class="col-md-4 site-sidebar" role="complementary">
    <h3 class="widget-title">关于本站</h3>
    
    <div class="feed-mail widget">
        <?php echo $this->getConfigValue('sys_site_about')?>
        <div class="clear"></div>
    </div>

    <?php echo $this->render('//_inc/taxonomy');?>
    
    <h3 class="widget-title">随便看看</h3>
    <div class="box_r widget">
        <ul class="random-post-link">
            <?php
            $datas = $this->getDataSource(null,'view_count desc',10);
            $this->loopData($datas,'//_inc/item_random');
            ?>

        </ul>
        <div class="clear"></div>
    </div>
    <h3 class="widget-title">热评文章</h3>
    <div class="hot widget">
        <ul>
            <?php
            $datas = $this->getDataSource(null,'view_count desc',10);
            $this->loopData($datas,'//_inc/item_random');
            ?>

        </ul>
        <div class="clear"></div>
    </div>

</div>
