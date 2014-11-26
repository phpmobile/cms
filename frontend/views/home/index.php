<?php
use yii\widgets\LinkPager;
use yii\helpers;
use yii\helpers\Url;
$this->title = '新闻中心';
$this->params['breadcrumbs'][] = $this->title;
 //$this->css[]='css/site_1.css';
         
?>
<a href="<?= Url::toRoute('edit')?>">
    添加
</a>
<table class="table">
    <tr>
        <th>
            标题
        </th>
        <th style="width: 150px;">
            时间
        </th>
    </tr>
    
    <?php   foreach ($table['models'] as $k=>$v):?>
        <?php $v->ui();?>
        <tr>
            <td>
                <a href="<?=Yii::$app->urlManager->createUrl(['home/view','id'=>$v['id']]);?>">
                    <?=$v['title']?>
                </a>
            </td>
            <td><?=$v['ui']['intime'];?></td>
            <td>
                <a href="<?=Yii::$app->urlManager->createUrl(['home/edit','id'=>$v['id']]);?>">
                    修改
                </a>
            </td>
        </tr>
    <?php endforeach; ?>         
    

</table>

<?php
echo LinkPager::widget([
    'pagination' => $table['pages'],
]);
?>