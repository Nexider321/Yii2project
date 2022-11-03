<?php
use yii\widgets\DetailView;
use app\models\Workers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\WorkersCategories;
use app\models\Categories;


/** @var yii\web\View $this */
/** @var frontend\models\WorkersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Workers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Workers', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Income crud', Url::toRoute( ['incomes/']),['class' => 'btn btn-success'] ) ?>
        <?= Html::a('Expenses crud', Url::toRoute( ['expenses/']),['class' => 'btn btn-success'] ) ?>
        <?= Html::a('Create Workers Categories', ['workers-categories/'], ['class' => 'btn btn-success']) ?>



    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'workerName',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
    <?php
    $sum_Expenses = 0;// echo $this->render('_search', ['model' => $searchModel]);
    $sum_Income = 0;


    ?>
    <br>


    <table>


    <h1>Доходы всех работников <?= $incomeSum?></h1>

    <br>
    <h1>Расходы всех работников <?= $expensesSum?></h1>
    <br>
    <h1>Прибыль всех работников = <?= $incomeSum - $expensesSum ?> </h1>

</div>
