<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkersCategories $model */

$this->title = 'Create Workers Categories';
$this->params['breadcrumbs'][] = ['label' => 'Workers Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
