<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\commentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">
    <div class="col-md-12 mt-4 p-4">
        <h3>Отзывы</h3>

        <p>
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a( 'Назад', ['admin/select'], ['class' => 'btn btn-warning']); ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm table-striped table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'comment',
            'item_id',

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
                ],
            ],
        ],
    ]); ?>

</div>
<div class="mail-items">
<!--    <div class="col-md-6">-->
<!--        --><?//= GridView::widget([
//            'dataProvider' => $mails,
////        'filterModel' => $searchModel,
//            'columns' => [
////                'id',
////                'order_id',
////                'product_id',
//                ['label' => 'Имя',
//                    'attribute' => 'name',
////                    'options' => ['class' => 'btn btn-primary']
//                ],
//                'email',
//                'subject',
//                'verifyCode',
//            ],
//        ]); ?>
<!--    </div>-->
</div>