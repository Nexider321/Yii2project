<?php
use yii\widgets\DetailView;
use app\models\Worker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\WorkerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Worker ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Worker', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Income crud', Url::toRoute( ['incomes/']),['class' => 'btn btn-success'] ) ?>
        <?= Html::a('Expenses crud', Url::toRoute( ['expenses/']),['class' => 'btn btn-success'] ) ?>



    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Worker $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
    <?php
    $sum_Expenses = 0;// echo $this->render('_search', ['model' => $searchModel]);
    $sum_Income = 0;
    ?>

    <table>


    <h1>Доходы всех работников <?= $incomeSum?></h1>

    <br>
    <h1>Расходы всех работников <?= $expensesSum?></h1>
    <br>
    <h1>Прибыль всех работников = <?= $incomeSum - $expensesSum ?> </h1>

</div>
