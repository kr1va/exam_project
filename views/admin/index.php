<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\itemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index row p-4">
    <div class="col-md-12 mt-4">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a( 'Назад', ['select'], ['class' => 'btn btn-warning']); ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class=" table-sm-responsive">
    <?= GridView::widget([
//        'options' => ['class' => 'table-responsive table-sm'],
        'tableOptions' => ['class' => 'table  table-sm '],
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'pager' => [
            'nextPageCssClass' => 'btn mx-1 ',
            'prevPageCssClass' => 'btn mx-1 ',
//            'firstPageLabel'=>'First',
//            'lastPageLabel'=>'Last',
            'firstPageCssClass' => 'btn mx-1',
            'lastPageCssClass' => 'btn mx-1 ',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'category',
            'name',
            'contents',
            'description',
            'price',
            'img',
            'link_name:ntext',
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

</div>
    <div class="" style="height:50px;">
        <br>
    </div>
</div>
