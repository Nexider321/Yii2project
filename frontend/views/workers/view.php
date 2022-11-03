<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Workers $model */

$this->title = $model->workerName;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create Income', Url::toRoute( ['workers-categories/income']),['class' => 'btn btn-success'] ) ?>
        <?= Html::a('Create Expense', Url::toRoute(['workers-categories/expense']),['class' => 'btn btn-success'] ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            [
                'attribute' => 'workers',
                'label' => 'Workers Id',
                'value' => $model->id,
            ],
            [
                'attribute' => 'workers',
                'label' => 'Workers',
                'value' => $model->workerName,
            ],
            [
                'attribute' => 'workers',
                'label' => 'Incomes',
                'value' => $sum_Income,
            ],
            [
                'attribute' => 'workers',
                'label' => 'Expenses',
                'value' => $sum_Expenses,
            ],
            [
                'attribute' => 'workers',
                'label' => 'Clear Income',
                'value' => $clear_Income,
            ],
        ],
    ]) ?>
</div>
