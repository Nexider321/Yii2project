<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Worker $model */

$this->title = $model->name;
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
        <?= Html::a('Create Income', Url::toRoute( ['incomes/create']),['class' => 'btn btn-success'] ) ?>
        <?= Html::a('Create Expense', Url::toRoute(['expenses/create']),['class' => 'btn btn-success'] ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>
    <?php
    $sum_Expenses = 0;// echo $this->render('_search', ['model' => $searchModel]);
    $sum_Income = 0;
    ?>

    <table>
        <h1>Worker name = <?= $model['name']?></h1>
        <h2>Доходы Работника</h2>
        <?php foreach($incomes as $item2): ?>

            <h3>Type of income:<?= $item2['type_income']?></h3>
            <h3>Cost: <?= $item2['costs']?></h3>
            <?php $sum_Income += $item2['costs']?>


        <?php endforeach;?>
        <h1>Сумма дохода: <?= $sum_Income?></h1>
        <br>
        <h2>Расходы Работника</h2>
        <?php foreach($expenses as $item): ?>


            <h3>Type of expense:<?= $item['type_expense']?></h3>
            <h3>Cost: <?= $item['costs']?></h3>
            <?php $sum_Expenses += $item['costs']?>

        <?php endforeach;?>
        <h1>Сумма расходов: <?= $sum_Expenses?></h1>

    </table>

    <h2>Прибыль работника = <?= $sum_Income - $sum_Expenses ?> </h2>

</div>
