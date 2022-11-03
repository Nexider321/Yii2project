<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Workers;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var app\models\WorkersCategories $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workers Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workers-categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],

        ])  ?>
               <?=  Html::a('Return to worker view', Url::toRoute(["workers/view", 'id' => $model->workerId]  ), ['class' => 'btn btn-success']) ?>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id',
            'categories.categoryName',
            'workers.workerName',
            'workerId',
            'expenseId',
            'incomeId',
        ],
    ]) ?>



</div>
