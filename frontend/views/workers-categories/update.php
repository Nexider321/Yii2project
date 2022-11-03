<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkersCategories $model */

$this->title = 'Update Workers Categories: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workers Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workers-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
