<?php

use app\models\Incomes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\IncomesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Incomes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incomes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::a('Workers crud', Url::toRoute( ['worker/']),['class' => 'btn btn-success'] ) ?>
    <?= Html::a('Incomes create', Url::toRoute( ['incomes/create']),['class' => 'btn btn-success'] ) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute' => 'worker',
            'label' => 'worker',
            'value' => 'worker.name'
            ],

            'type_income',
            'costs',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Incomes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],

    ]); ?>

    <?php foreach ($names as $name): ?>

        <?= $name ['id'], " ", $name['name']?>

    <?php endforeach;?>

    <?php

    ?>
</div>
