<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use app\models\BbsClass;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BbsClassController extends MyController
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $table=BbsClass::getTable();
        return $this->render('index',[
                'table'=>$table,
                ]);
    }
    
    public function actionView($id)
    {
        $model=Bbs::getModelById($id);
        return $this->render('view',[
                'model'=>$model,
                ]);
    }
    
    public function actionEdit($id=null){
        if($id){
            $model=  BbsClass::getModelById($id);
        }
        else {
           $model=new BbsClass();
        }
        
        if ($model->load(Yii::$app->request->post(),'form')) {
            $return= $model->edit();
           // self::echoJson($return);
            $this->redirect(['bbs/index']);
        }
        return $this->render('edit',[
                'model'=>$model,
                ]);
    }
    
    public static function echoJson($return) {
        echo json_encode($return);
        Yii::$app->end();
    }
    
}
