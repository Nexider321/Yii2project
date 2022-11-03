<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\controllers\CategoriesController;
/** @var yii\web\View $this */
/** @var app\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php
$items = [
    '1' => 'Expensive',
    '0' => 'Income',

];
$params = [
    'prompt' => 'Choose type'
];
?>
<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'categoryName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList($items, $params)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
