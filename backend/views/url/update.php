<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Url */

$this->title = 'Редактирование URL';
//$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => 'Потоки', 'url' => ['/stream/update', 'id' => $model->st_id]];
//$this->params['breadcrumbs'][] = ['label' => $model->st_id, 'url' => ['view', 'id' => $model->st_id]];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="url-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'searchModelUrl' => $searchModelUrl,
        'dataProviderUrl' => $dataProviderUrl,
    ]) ?>

</div>
