<?php

namespace source\modules\about\admin\controllers;

use source\LuLu;
use source\modules\about\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
