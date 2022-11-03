<?php
use app\models\Incomes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
?>
<?php
$sum = 0;
?>

<?php foreach($incomes as $item): ?>

<?php $sum += $item['costs']; ?>

<?php endforeach;?>

<h2>Сумма всех работников <?= $sum ?></h2>
