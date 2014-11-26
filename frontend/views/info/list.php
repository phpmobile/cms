<?php
use yii\widgets\LinkPager;
use yii\helpers;
use yii\helpers\Url;
$this->title = '技术论坛';
$this->params['breadcrumbs'][] = $this->title;
 //$this->css[]='css/site_1.css'; 
?>
<a href="<?= Url::toRoute(['edit','class_id'=>$model['id']])?>">
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
                <a href="<?=Url::to(['view','id'=>$v['id']]);?>">
                    <?=$v['title']?>
                </a>
            </td>
            <td>
                <a href="<?=Url::to(['edit','id'=>$v['id']]);?>">
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