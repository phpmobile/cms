<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use app\models\InfoClass;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class InfoClassController extends MyController
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $table=BbsClass::getTable();
        return $this->render('index',[
                'table'=>$table,
                ]);
    }
    
    public function actionList($id=1)
    {
        $table=InfoClass::tablePid($id);
        $model=  InfoClass::modelId($id);
        return $this->render('list',[
            'table'=>$table,
            'model'=>$model,
        ]);
    }
    
    public function actionView($id)
    {
        $model=InfoClass::modelId($id);
        return $this->render('view',[
            'model'=>$model,
        ]);
    }
    
    public function actionEdit($id=null,$pid=null){
        $model=InfoClass::editForm($id, $pid);
        return $this->render('edit',[
            'model'=>$model,
        ]);
    }
   
    
}
