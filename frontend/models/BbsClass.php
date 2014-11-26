<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbs_class".
 *
 * @property string $id
 * @property string $title
 * @property string $des
 * @property string $pid
 * @property integer $type
 */
class BbsClass extends \common\my\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bbs_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'type'], 'integer'],
            [['title'], 'string', 'max' => 500],
            [['des'], 'string', 'max' => 2000]
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
            'des' => 'Des',
            'pid' => 'Pid',
            'type' => 'Type',
        ];
    }
    
    public function ui($group=""){
        //$this->ui['intime']=date('Y-m-d',$this->intime);
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

    public static function getModelById($id){
        $model = self::findOne($id);
        return $model;
    }
    
    public static function getTable(){
        $query = self::find()->where(['or']);
        $table=self::table($query);
        return $table;
    }
}
