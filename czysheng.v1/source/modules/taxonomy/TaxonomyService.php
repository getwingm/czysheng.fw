<?php
namespace source\modules\taxonomy;

use source\LuLu;
use source\core\modularity\ModuleService;
use source\core\modularity\ModuleInfo;
use source\modules\modularity\models\Modularity;
use yii\helpers\FileHelper;
use source\modules\taxonomy\models\Taxonomy;
use source\helpers\ArrayHelper;
use source\modules\taxonomy\models;
use source\modules\taxonomy\models\TaxonomyCategory;

class TaxonomyService extends ModuleService
{

    public function getServiceId()
    {
        return 'taxonomyService';
    }

    public function getTaxonomyCategories()
    {
        $categories = TaxonomyCategory::findAll([],'name asc');
        return $categories;
    }
    
    public function getTaxonomiesAsTree($category, $parentId=0)
    {
        return Taxonomy::getArrayTree($category, $parentId);
    }

    public function getTaxonomyIDsAsTree($category, $parentId=0)
    {
        $items = Taxonomy::getArrayTree($category, $parentId);
        $ids = [];
        foreach($items as $tax)
        {
            $ids[] = $tax->id;
        }
        return $ids;
    }

    public function getFirstLevelTaxonomyIDs($category, $parentId=0)
    {
        $items = Taxonomy::getArrayTree($category, $parentId);
        $ids = [];
        foreach($items as $tax)
        {
            if($tax->parent_id == $parentId)
            {
                $ids[] = $tax->id;
            }
        }
        return $ids;
    }

    public function getFirstLevelTaxonomiesAsArray($category, $parentId=0)
    {
        $items = Taxonomy::getArrayTree($category, $parentId);
        $mTaxs = [];
        $count = 0;
        foreach($items as $tax)
        {
            if($tax->parent_id == $parentId)
            {
                $mTaxs[] = array();
                $count++;
            }
            $mTaxs[$count-1][] = $tax;
        }
        return $mTaxs;
    }

    public function getTaxonomiesAsTreeWhereHasId($category, $id, $parentId=0)
    {
        $taxonomies = Taxonomy::getArrayTree($category, $parentId);
        $items = [];
        $bfind = false;
        foreach($taxonomies as $tax)
        {
            if($tax->parent_id == $parentId)
            {
                if($bfind)
                {
                    return $items;
                }
                $items = [];
            }
            if($tax->id == $id)
            {
                $bfind = true;
            }
            $items[] = $tax;
        }
        if($bfind)
        {
            return $items;
        }
        return array();
    }

    public function getTaxonomyById($id,$default=true)
    {
        $taxonomyModel = Taxonomy::getTaxonomyById($id);
        if($taxonomyModel===null && $default===true)
        {
            $taxonomyModel= new Taxonomy();
            $taxonomyModel->id=-1;
            $taxonomyModel->name='所有';
        }
        return $taxonomyModel;
    }
    
    public function getModel($model)
    {
        $items = [
            'Taxonomy'=>Taxonomy::className(),
            'TaxonomyCategory'=>TaxonomyCategory::className(),
        ];
        return ArrayHelper::getItems($items,$model,true);
    }
}
