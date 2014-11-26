<?php

namespace app\models;

use Yii;
use \common\my\Fun;

/**
 * This is the model class for table "{{%info}}".
 *
 * @property string $id
 * @property string $m_class_id
 * @property string $title
 * @property string $content
 * @property integer $intime
 * @property integer $uptime
 */
class Info extends \common\my\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_class_id', 'intime', 'uptime'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'm_class_id' => 'M Class ID',
            'title' => 'Title',
            'content' => 'Content',
            'intime' => 'Intime',
            'uptime' => 'Uptime',
        ];
    }
    public function ui($group=""){
        $this->ui['intime']=date('Y-m-d',$this->intime);
    }
    
    public function edit(){
        if($this->isNewRecord){
            $this->uptime=time();
            $this->intime=time();
        }
        else {
            $this->uptime=time();
        }
        $return=$this->save();
        if ($return) {
            return array('status' => 1, 'msg' => '保存成功');
        } else {
            return array('status' => 0, 'msg' => '保存失败');
        }
    }
    
    public static function editForm($id,$class_id){
        if($id){
           $model= self::modelId($id);
        }
        else {
           $model=new self();
           if($class_id){
              $model->m_class_id=$class_id;
           }
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
    
    public static function getModelById($id){
        $model = self::findOne($id);
        return $model;
    }
    
    
    public static function getTable(){
        $query = self::find()->where(['or']);
        $table=self::table($query);
        return $table;
    }
    
    public static function tableClassId($class_id){
        $query = self::find()->where(['and','m_class_id='.$class_id]);
        $table=self::table($query);
        return $table;
    }
    
    
    
}
