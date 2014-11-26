<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmsInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'des')->textInput(['maxlength' => 2000]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'intime')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'uptime')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'm_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
