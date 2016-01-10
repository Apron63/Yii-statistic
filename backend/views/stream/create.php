<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Stream */

$this->title = 'Создать поток';
//$this->params['breadcrumbs'][] = ['label' => 'Потоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => 'Потоки', 'url' => ['/project/update', 'id' => $model->pr_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stream-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
