<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Url */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url_url')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'url_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_rot')->textInput() ?>

    <?= $form->field($model, 'url_comment')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
