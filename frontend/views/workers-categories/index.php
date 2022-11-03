<?php

use app\models\WorkersCategories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\WorkersCategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Workers Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Worker Income', ['income'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Worker Expense', ['expense'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Workers Crud', Url::toRoute(['workers/index']),['class' => 'btn btn-success'] ) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'workers',
                'label' => 'Workers',
                'value' => 'workers.workerName',
            ],
            [
                'attribute' => 'categories',
                'label' => 'Categories',
                'value' => 'categories.categoryName',
            ],
            [
                'attribute' => 'incomes',
                'label' => 'Income',
                'value' => 'incomes.type_income',
            ],
            [
                'attribute' => 'expenses',
                'label' => 'Expenses',
                'value' => 'expenses.type_expense',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkersCategories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
