<?php

namespace app\models;

/**
 * This is the model class for table "cms_info".
 *
 * @property string $id
 * @property string $title
 * @property string $des
 * @property string $content
 * @property string $intime
 * @property string $uptime
 * @property integer $m_id
 * @property string $type
 */
class CmsInfo extends \common\my\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['intime', 'uptime', 'm_id', 'type'], 'integer'],
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
            'content' => 'Content',
            'intime' => 'Intime',
            'uptime' => 'Uptime',
            'm_id' => 'M ID',
            'type' => 'Type',
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
