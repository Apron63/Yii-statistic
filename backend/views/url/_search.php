<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UrlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'url_id') ?>

    <?= $form->field($model, 'url_url') ?>

    <?= $form->field($model, 'url_name') ?>

    <?= $form->field($model, 'url_rot') ?>

    <?= $form->field($model, 'url_comment') ?>

    <?php // echo $form->field($model, 'pr_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
