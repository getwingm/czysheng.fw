<?php

namespace source\modules\about\admin;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\about\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        ['首页',['/about']],
    //        ['设置',['/about/setting']],
    //    ];
    //}
}
