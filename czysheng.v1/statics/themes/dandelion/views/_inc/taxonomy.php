<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\models\Taxonomy;
use source\LuLu;
use source\helpers\ArrayHelper;


/* @var $this yii\web\View */

$controller = LuLu::$app->controller;
$controller_id = $controller->id;
$moduleId = $controller->module->id;
if($moduleId == "about"){
    return;
}
try{
    $taxonomyid = ArrayHelper::getItems(LuLu::$app->controller->actionParams, 'taxonomy', true);
}catch (Exception $e){
    $taxonomyid = 31;
}
$taxonomy_parent = $taxonomyid;

$taxonomies = LuLu::getService('taxonomy')->getTaxonomiesAsTree($this->getConfigValue('post_taxonomy'));
$sub_taxonomies = LuLu::getService('taxonomy')->getTaxonomiesAsTreeWhereHasId($this->getConfigValue('post_taxonomy'), $taxonomyid);
//$mtaxonomies = LuLu::getService('taxonomy')->getFirstLevelTaxonomiesAsArray($this->getConfigValue('post_taxonomy'));
if(!empty($taxonomies))
{
?>
    <h3 class="widget-title">分类</h3>
    <div class="hot widget">
        <ul>
            <?php foreach ($sub_taxonomies as $taxonomy) {?>
            <li>
                <?php
                if($taxonomy['id'] == $taxonomy_parent || $taxonomy['id']==0) {
                    echo Html::a('所有', ['/post/'.$controller_id]);
                }else {
                    echo Html::a($taxonomy['name'], ['/post/'.$controller_id.'/list', 'taxonomy' => $taxonomy['id']]);
                }
                ?>
            </li>
            <?php };?>

        </ul>
        <div class="clear"></div>
    </div>
<?php }?>