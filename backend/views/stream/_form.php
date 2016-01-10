<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Stream */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stream-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'pr_id')->textInput() ?>-->

    <?= $form->field($model, 'st_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_url')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php if (!$model->isNewRecord) {

        echo GridView::widget([
            'dataProvider' => $dataProviderUrl,
            'filterModel' => $searchModelUrl,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'url_id',
                'url_url:url',
                'url_name',
                'url_rot',
                'url_comment:ntext',

                [   'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'controller' => 'url',
                ],
            ],
        ]);

        echo '<div class="form-group">';
        echo Html::a('Добавить URL', ['/url/create', 'st_id'=> $model->st_id], ['class' => 'btn btn-success']);
        echo '</div>';

            
    }?>

    <?php ActiveForm::end(); ?>

</div>
