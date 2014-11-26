<?php
use yii\helpers\Url;
?>

<style type="text/css">
 .form ul li { list-style: none; line-height: 2em; padding: 0.5em;}
  .form ul li input{ width: 100%;}
   .form ul li textarea{ width: 100%; height: 5em;} 
</style>
<form class="form"  action="<?= Url::to(['edit','id'=>$model['id']]); ?>" method="post">
    <input type="hidden" name="form[pid]" value="<?=$model['pid']?>"/>
    <ul>
        <li><input placeholder="标题(必填)" type="text" name="form[title]" value="<?=$model['title']?>"/></li>         
        <li>
            <input type="submit" value="提交"/>
        </li>
    </ul>
    <input type="hidden" name="_csrf" value="<?= 1?>">
</form>


