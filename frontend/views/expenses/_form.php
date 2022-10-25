<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Worker;

/** @var yii\web\View $this */
/** @var app\models\Expenses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_expense')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costs')->textInput() ?>

    <?php
    /* @var $this yii\web\View */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $model app\models\Worker */

    echo $form->field($model, 'id_worker')->dropdownList(
        Worker::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Select Worker']
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
