<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление заказами';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index mt-4 p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
<!--        --><?//= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['admin/select'], ['class' => 'btn btn-warning']); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'options'=> ['class' => 'table table-sm'],
        'pager' => [
            'nextPageCssClass' => 'btn mx-1 ',
            'prevPageCssClass' => 'btn mx-1 ',
            'firstPageCssClass' => 'btn mx-1',
            'lastPageCssClass' => 'btn mx-1 ',
        ],
        'tableOptions' => [
            'class' => 'table table-sm table-bordered'
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'date',
            'name',
            'email:email',
            'phone',
            'adress',
            'sum',
            'delivery',
            'pay_method',
            'status',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye" aria-hidden="true"></span>', $url, [
                            'title' => 'Просмотр',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span>', $url, [
                            'title' => 'Редактировать',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title' => 'Удалить',
                            'data' => [
                                'method' => 'post',
                                'confirm' =>'Вы действительно хотите удалиь эту запись?',
                            ]
                        ]);
                    },
                ],],
        ],
    ]); ?>


</div>
<div class="" style="height:50px;">
    <br>
</div>