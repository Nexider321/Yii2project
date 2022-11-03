<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="incomes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    /* @var $this yii\web\View */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $model app\models\Workers */

    echo $form->field($model, 'category_id')->dropdownList(
        Categories::find()->where(['type' => 0])->select(['categoryName', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Select categories']
    );
    ?>
    <?= $form->field($model, 'type_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costs')->textInput() ?>


    <?php
    /* @var $this yii\web\View */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $model app\models\Workers */


    ?>
    <div class="form-group">
        <br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
