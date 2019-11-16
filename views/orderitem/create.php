<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderItem */

$this->title = 'Create Order Item';
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-book-create p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
