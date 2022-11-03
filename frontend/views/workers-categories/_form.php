<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;
use app\models\Workers;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\WorkersCategories $model */
/** @var yii\widgets\ActiveForm $form */
$urlWorkersCategoriesByCustomer = Url::to(['workers-categories/ajax-drop-down-list-by-category-id']);
$this->registerJs( <<< EOT_JS

$(document).on('change', '#workerscategories-categoryid', function(ev) {

$('#detail').hide();

var customer_id = $(this).val();

$.get(
    '{$urlWorkersCategoriesByCustomer}',
    { 'customer_id' : customer_id },
    function(data) {
        data = '<option >--- choose</option>'+data;
$('#workerscategories-incomeid').html(data);
    }    
)
    ev.preventDefault();
 });
 
EOT_JS
);
?>

<div class="workers-categories-form">


    <?php $form = ActiveForm::begin(['enableAjaxValidation' => false,
        'enableClientValidation' => false, 'options' => ['data-pjax' => '']]); ?>



    <?= $form->field($model, 'workerId')->dropDownList(
            Workers::find()->select(['workerName', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Get Worker']
    ) ?>







    <?= $form->field($model, 'categoryId')->dropDownList(
        Categories::find()->where(['type' => 0])->select(['categoryName', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Get category'])?>
    <?php $incomes = \app\models\Incomes::findAll(['category_id' => $model->categoryId]); ?>
    <?= $form->field($model, 'incomeId')->label('incomeId')->dropDownList(ArrayHelper::map( $incomes, 'id',
        function($temp, $defaultValue) {
        }), [ 'prompt' => '--- choose' ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
