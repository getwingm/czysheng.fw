<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Taxonomy;
use source\libs\Resource;
use source\LuLu;
use yii\helpers\Url;
use source\models\Menu;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<?php echo $this->render('header.php'); ?>
<!-- Content -->
<div id="da-content">
    <!-- Container -->
    <div class="da-container">
        <!-- Main Content Wrapper -->
            <!-- Content Area -->
            <div id="da-content-area">
                <?php echo $content ?>
            </div>
    </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php $this->endPage() ?>