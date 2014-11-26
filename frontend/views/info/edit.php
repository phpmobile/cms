<?php
use yii\helpers\Url;
?>

<style type="text/css">
 .form ul li { list-style: none; line-height: 2em; padding: 0.5em;}
  .form ul li input{ width: 100%;}
   .form ul li textarea{ width: 100%; height: 5em;} 
</style>
<form class="form"  action="<?= Url::to(['edit','id'=>$model['id']]); ?>" method="post">
    <input  type="hidden" name="form[m_class_id]" value="<?=$model['m_class_id']?>"/>
    <ul>
        <li><input placeholder="标题(必填)" type="text" name="form[title]" value="<?=$model['title']?>"/></li>         
        <li>
            <textarea name="form[content]" placeholder="内容" id="content"  ><?=$model['content']?></textarea>    
<?php \common\ext\kindeditor\KindEditor::widget([
    'id' => 'content',
    'model' => $model,
    'attribute' => 'content',
    'items' => [
        'langType' => Yii::$app->language, // 'en' , 'zh-CN'
        'height' => '300px',
        'themeType' => 'simple',
        'allowImageUpload' => true,
        'allowFileManager' => true,
        'uploadJson' => 'upload_json.php',
        'fileManagerJson' => '../php/file_manager_json.php',
        'items' => [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link',
        ]
    ],
])?>
        </li>
        <li>
            <input type="submit" value="提交"/>
        </li>
    </ul>
</form>


