<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use app\models\Info;
use app\models\InfoClass;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class InfoController extends MyController
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $table=BbsClass::getTable();
        return $this->render('index',[
                'table'=>$table,
                ]);
    }
    public function actionList($id)
    {
        $table=Info::tableClassId($id);
        $model=  InfoClass::modelId($id);
        return $this->render('list',[
            'table'=>$table,
            'model'=>$model,
        ]);
    }
    
    public function actionView($id)
    {
        $model=Info::modelId($id);
        return $this->render('view',[
                'model'=>$model,
                ]);
    }
    
    public function actionClass($class_id)
    {
        $model=  BbsClass::getModelById($class_id);
        $table=Bbs::getTableByCid($class_id);
        return $this->render('class',[
                'model'=>$model,
                 'table'=>$table,
                ]);
    }
    
    public function actionEdit($id=null,$class_id=null){
        $model=Info::editForm($id,$class_id);
        return $this->render('edit',[
            'model'=>$model,
        ]);
    }
    

    
}
