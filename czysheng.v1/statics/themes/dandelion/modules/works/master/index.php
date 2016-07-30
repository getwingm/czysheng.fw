<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;
/* @var $this yii\web\View */

$this->registerCss(".blocktext{text-decoration: underline; line-height: 30px; display: inline-block;width: 30px;height: 30px;}");
$this->registerCss(".wordwrap{word-wrap:break-word;padding-top: 6px}");

$this->title = $taxonomyModel['name'];
$taxonomies = $this->taxonomyService->getTaxonomiesAsTree('works-category');
$this->params['taxonomies'] = $taxonomies;
$masters = $this->taxonomyService->getTaxonomiesAsTree('works-master');
$this->params['masters'] = $masters;

?>

<div class="da-panel">
    <div class="da-panel-header">
        <div class="da-panel-title">
            <img src="<?php echo Resource::getAdminUrl()?>/basic/images/icons/black/32/music.png" alt="">
            <?= $this->title ?>
        </div>
        <div class="da-panel-search">
            <input id="search_edit" type="text" style="height: 22px;display:inline-block;">
            <button class="da-button default" onclick="dosearch()">搜索</button>
        </div>
    </div>
    <div class="da-panel-content">
        <table class="da-table">
            <?php  $this->loopData($rows, '//_inc/item_sutra'); ?>
        </table>
        <?php echo \statics\themes\dandelion\functions\LinkPager::widget(['pagination' => $pager]); ?>
    </div>
</div>
<script>
    function dosearch(){
        var key = document.getElementById("search_edit").value;
        var url = '/index.php?r=sutra/search&key='+ key;
        window.open(url,'_self');
    }
</script>