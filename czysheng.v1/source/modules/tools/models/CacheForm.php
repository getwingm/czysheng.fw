<?php

namespace source\modules\tools\models;

use source\LuLu;
use source\helpers\ArrayHelper;

class CacheForm extends \source\core\base\BaseModel
{

	public $cache;
	public $asset;
    public $memcache;
	
    public function rules()
    {
        return [
            [['cache', 'asset', 'memcache'], 'boolean'],
            [['test1', 'test2'], 'string', 'max'=>64],
        ];
    }

  
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'cache' => '清空缓存',
            'asset' => '清空Asset',
            'memcache' => '清空Memcache',
        ];
        return ArrayHelper::getItems($items,$attribute);
    }   
}
