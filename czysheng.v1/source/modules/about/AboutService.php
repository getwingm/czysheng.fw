<?php

namespace source\modules\about;

use source\LuLu;

class AboutService extends \source\core\modularity\ModuleService
{

    public function init()
    {
        parent::init();
    }
    
    public function getServiceId()
    {
        return 'aboutSerivce';
    }
}
