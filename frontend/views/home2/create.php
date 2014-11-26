<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmsInfo */

$this->title = 'Create Cms Info';
$this->params['breadcrumbs'][] = ['label' => 'Cms Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
