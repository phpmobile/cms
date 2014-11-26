<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use \app\models\News;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class NewsController extends MyController
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        $table=News::getTable();
        return $this->render('index',[
                'table'=>$table,
                ]);
    }
    
    public function actionView($id)
    {
        $model=News::getModelById($id);
        return $this->render('view',[
                'model'=>$model,
                ]);
    }
    
    public function actionEdit($id=null){
        if($id){
            $model=  News::getModelById($id);
        }
        else {
           $model=new News();
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
