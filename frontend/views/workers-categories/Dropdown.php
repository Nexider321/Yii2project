<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Categories;
use app\models\Incomes;
$urlWorkersCategoriesByCustomer = Url::to(['workers-categories/ajax-drop-down-list-by-category-idd']);
$this->registerJs( <<< EOT_JS

$(document).on('change', '#incomes-category_id', function(ev) {

$('#detail').hide();

var customer_id = $(this).val();

$.get(
    '{$urlWorkersCategoriesByCustomer}',
    { 'customer_id' : customer_id },
    function(data) {
        data = '<option >--- choose</option>'+data;
$('#incomes-id').html(data);
    }    
)
    ev.preventDefault();
 });
 
EOT_JS
);
?>
<div class="customer-form">
    <?php $form = ActiveForm::begin(['enableAjaxValidation' => false,
        'enableClientValidation' => false, 'options' => ['data-pjax' => '']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        Categories::find()->select(['categoryName', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Get category'])?>
    <?php $incomes = \app\models\Incomes::findAll(['category_id' => $model->category_id]); ?>
    <?= $form->field($model, 'id')->label('incomeId')->dropDownList(ArrayHelper::map( $incomes, 'id',
        function($temp, $defaultValue) {
    }), [ 'prompt' => '--- choose' ]);
?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>