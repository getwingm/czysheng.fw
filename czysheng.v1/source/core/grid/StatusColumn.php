<?php
namespace source\core\grid;

use source\helpers\ArrayHelper;
use source\libs\Constants;
class StatusColumn extends DataColumn
{

    public $attribute = 'status';
    public $headerOptions=['width'=>'25px'];

    public function init()
    {
        parent::init();
        $this->contentOptions=['class'=>'align-center'];
        $this->content = function($model,$key,$index,$gridView){
            $attribute = $this->attribute;
            return Constants::getStatusItems($model->$attribute);
        };
    }
}