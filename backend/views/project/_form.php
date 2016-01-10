<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pr_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    
    <?php if (!$model->isNewRecord) {


        echo GridView::widget([
            'dataProvider' => $dataProviderStream,
            'filterModel' => $searchModelStream,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'st_name',
                'st_url:url',
                'st_cnt',

                [    'class' => 'yii\grid\ActionColumn',
                     'template' => '{copy} {update} {delete}',
                     'controller' => 'stream',
                     'buttons' => [
                                 'copy' => function($url, $model){
                                     return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Скопировать']);
                                 }
                             ]
                ],
            ],
        ]);

        echo '<div class="form-group">';
        echo Html::a('Создать поток', ['/stream/create', 'id'=> $model->pr_id], ['class' => 'btn btn-success']);
        echo '</div>';

        }
    ?>

    <?php ActiveForm::end(); ?>

</div>
