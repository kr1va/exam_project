<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderItem */

$this->title = 'Update Order Item: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-book-update p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
