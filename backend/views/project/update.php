<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Редактирование проекта';
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->pr_id, 'url' => ['view', 'id' => $model->pr_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="project-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderStream' => $dataProviderStream,
        'searchModelStream' => $searchModelStream,
    ]) ?>

</div>
