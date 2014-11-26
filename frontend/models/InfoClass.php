<?php

namespace app\models;

use Yii;
use common\my\Fun;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%info_class}}".
 *
 * @property string $id
 * @property string $title
 * @property string $pid
 */
class InfoClass extends \common\my\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%info_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['title'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'pid' => 'Pid',
        ];
    }
    public function ui($group=""){
        //$this->ui['intime']=date('Y-m-d',$this->intime);
        $this->ui['url']=Url::to([$this->view,'id'=>$this->id]);
    }
    
    public function edit(){
        if($this->isNewRecord){
           // $this->intime=time();
        }
        $return=$this->save();
        if ($return) {
            return array('status' => 1, 'msg' => '保存成功');
        } else {
            return array('status' => 0, 'msg' => '保存失败');
        }
    }
    
    public static function editForm($id,$pid){
        if($id){
            $model= self::modelId($id);
        }
        else {
           $model=new self();
           $model->pid=$pid;
        }
        
        if ($model->load(Yii::$app->request->post(),'form')) {
            $num= $model->edit();
            if ($num) {
                $return = array('status' => 1, 'msg' => '保存成功');
            } else {
                $return = array('status' => 0, 'msg' => '保存失败');
            }
            Fun::echoJson($return);
        }
        return $model;
    }
    
    public static function tablePid($pid){
        $query = self::find()->where(['and','pid='.$pid]);
        $table=self::table($query);
        return $table;
    }
}
