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
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo $this->getConfigValue('sys_seo_keywords')?>">
        <meta name="description" content="<?php echo $this->getConfigValue('sys_seo_description')?>">
        <!-- Viewport metatags -->
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="320" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- iOS webapp metatags -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />

        <!-- iOS webapp icons -->
        <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="touch-icon-retina.png" />

        <?php Resource::registerTheme([
            '/basic/css/reset.css',
            '/basic/css/fluid.css',
            '/basic/css/dandelion.theme.css',
            '/basic/css/dandelion.css',
            '/basic/css/demo.css',
            '/site/css/site.css',

        ]);?>


        <!-- jQuery JavaScript File -->
        <?php Resource::registerTheme('/basic/js/jquery-1.7.2.min.js');?>
        <!-- jQuery-UI JavaScript Files -->

        <?php Resource::registerTheme([
            '/basic/plugins/jui/js/jquery-ui-1.8.20.min.js',
            '/basic/plugins/jui/js/jquery.ui.timepicker.min.js',
            '/basic/plugins/jui/js/jquery.ui.touch-punch.min.js',
            '/basic/plugins/jui/css/jquery.ui.all.css',
        ]);

        ?>

        <!-- Plugin Files -->
        <?php Resource::registerTheme([
            '/basic/plugins/fileinput/jquery.fileinput.js',
            '/basic/plugins/placeholder/jquery.placeholder.js',
            '/basic/plugins/mousewheel/jquery.mousewheel.js',
            '/basic/plugins/tinyscrollbar/jquery.tinyscrollbar.min.js',
            '/basic/plugins/tipsy/jquery.tipsy-min.js',
            '/basic/plugins/tipsy/tipsy.css',
        ]);?>

        <!-- Demo JavaScript Files -->
        <?php Resource::registerTheme([
            '/basic/js/demo/demo.validation.js',
            '/basic/js/demo/demo.ui.js',
            '/basic/plugins/datatables/jquery.dataTables.min.js',
            '/basic/js/demo/demo.tables.js',
        ]);?>

        <!-- Core JavaScript Files -->
        <?php Resource::registerTheme([
            '/basic/js/core/dandelion.core.js',
            //'/js/core/dandelion.customizer.js',
        ]);?>

        <?php Resource::registerTheme([
            '/site/js/site.js',
            //'/js/core/dandelion.customizer.js',
        ]);?>

        <title><?php echo $this->title ?> - <?php echo $this->getConfigValue('sys_site_name')?></title>
        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody() ?>
<div id="da-wrapper" class="fixed">
    <div id="da-menubar">
        <div id="da-menu-head">
            <div id="title"><span>纯真有声</span></div>
            <div id="da-menubar-container">
                <div id="da-menu-nav">
                    <ul>
                        <?php $this->renderMenu('afxmain');?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 10px;visibility: hidden;"></div>