<?php
namespace frontend\controllers;

use Yii;
use common\my\MyController;
use app\models\Bbs;
use app\models\BbsClass;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BbsController extends MyController
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
        if($id){
            $model=  Bbs::getModelById($id);
        }
        else {
           $model=new Bbs();
           $model->m_class_id=$class_id;
        }
        
        if ($model->load(Yii::$app->request->post(),'form')) {
            $return= $model->edit();
            $this->redirect(['/bbs/class','class_id'=>  $model->m_class_id]);
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
