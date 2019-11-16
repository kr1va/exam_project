<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-book-index p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Create Order Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'options'=> ['class' => 'table table-sm'],
        'tableOptions' => [
            'class' => 'table table-sm table-bordered'
        ],
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'product_id',
            'name',
            'price',
            'qty',
            'sum',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye" aria-hidden="true"></span>', $url, [
                            'title' => 'View',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span>', $url, [
                            'title' => 'Update',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title' => 'Delete',
                            'data' => [
                                'method' => 'post',
                                'confirm' =>'Are you sure you want to delete this item?',
                            ]
                        ]);
                    },
//                ],
                ],
                ],
        ],
    ]); ?>


</div>
