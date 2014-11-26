<?php
use yii\helpers\Url;
?>

<style type="text/css">
 .form ul li { list-style: none; line-height: 2em; padding: 0.5em;}
  .form ul li input{ width: 100%;}
   .form ul li textarea{ width: 100%; height: 5em;} 
</style>
<form class="form"  action="<?= Url::to(['edit','id'=>$model['id']]); ?>" method="post">
    <ul>
        <li><input placeholder="标题(必填)" type="text" name="form[title]" value="<?=$model['title']?>"/></li>         
        <li>
            <textarea name="form[des]" placeholder="内容" ><?=$model['des']?></textarea>
        </li>
        <li>
            <input type="submit" value="提交"/>
        </li>
    </ul>
    <input type="hidden" name="_csrf" value="<?= 1?>">
</form>


