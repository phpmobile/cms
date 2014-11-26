<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use \app\models\CmsInfo;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class HomeController extends MyController
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $table=CmsInfo::getTable();
        return $this->render('index',[
                'table'=>$table,
                ]);
    }
    
    public function actionView($id)
    {
        $model=CmsInfo::getModelById($id);
        return $this->render('view',[
                'model'=>$model,
                ]);
    }
    
    public function actionEdit($id=null){
        if($id){
            $model=  CmsInfo::getModelById($id);
        }
        else {
           $model=new CmsInfo();
        }
        
        if ($model->load(Yii::$app->request->post(),'form')) {
            $return= $model->edit();
           // self::echoJson($return);
            $this->redirect(['index']);
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
