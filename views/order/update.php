<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\order */

$this->title = 'Редактировать заказ ' . $model->id.' для '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update mt-4 p-4">

    <h3 ><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'orderItems' => $orderItems
    ]) ?>


</div>
