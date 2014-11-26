<?php

namespace common\my;

use Yii;
use yii\data\Pagination;

class MyActiveRecord extends \yii\db\ActiveRecord
{
    public $ui=[];
    static function table($query){
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>30]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return ['pages'=>$pages,'models'=>$models];
    }
    
    public static function modelId($id){
        $model = self::findOne($id);
        return $model;
    }
}
