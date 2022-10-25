<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Worker;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="incomes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_income')->textInput(['maxlength' => true]) ?>

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
        <br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
