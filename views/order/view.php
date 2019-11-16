<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view p-4">
<div class="row">
    <div class="col-md-12 mt-4 ">
        <h3>Заказ №: <?= Html::encode($this->title) ?></h3>
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Назад', ['index'], ['class' => 'btn btn-warning']); ?>
<!--            --><?//= Html::a( 'Back', Yii::$app->request->referrer, ['class' => 'btn btn-warning']); ?>
        </p>
    </div>

    <div class="col-md-6 p">
        <?= DetailView::widget([
            'model' => $model,
            'options'=> ['class' => 'table table-sm'],
            'attributes' => [
                'id',
                'date',
                ['label' => 'Имя',
                 'attribute' => 'name',
//                    'options' => ['class' => 'btn btn-primary']
                 ],
                'email:email',
                'phone',
                'adress',
                'sum',
                'delivery',
                'pay_method',
                'status',
            ],
        ]) ?>

    </div>

    <div class="col-md-6">
        <?= GridView::widget([
            'dataProvider' => $orderItems,
//        'filterModel' => $searchModel,
            'columns' => [
//                'id',
//                'order_id',
//                'product_id',
                ['label' => 'Имя',
                    'attribute' => 'name',
//                    'options' => ['class' => 'btn btn-primary']
                ],
                'price',
                'qty',
                'sum',
            ],
        ]); ?>
    </div>

</div>
</div>
<div class="" style="height:50px;">
    <br>
</div>
