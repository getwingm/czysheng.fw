<?php

namespace source\modules\about\home;

use source\LuLu;

class HomeModule extends \source\core\modularity\FrontModule
{
    
    public $controllerNamespace = 'source\modules\about\home\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        //['首页',['/about']],
    //        //['设置',['/about/setting']],
    //    ];
    //}
}
