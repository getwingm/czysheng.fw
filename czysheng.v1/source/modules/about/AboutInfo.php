<?php

namespace source\modules\about;

use source\LuLu;

class AboutInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='about';
        $this->name = '关于';
        $this->version = '1.0';
        $this->description = '描述关于';
        $this->is_system = true;
    }
}
