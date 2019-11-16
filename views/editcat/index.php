<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index my-4 p-4">

    <h3 ><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Добавиь категорию', ['create'], ['class' => 'btn btn-success']) ?>
<!--        --><?//= Html::a( 'Back', ['admin'], ['class' => 'btn btn-warning'])?>
        <?= Html::a( 'Назад', URL::to(['admin/select']), ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-md-7 pb-2">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
            'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            ['class' => 'yii\grid\ActionColumn'],
//            'id',
                'cat_name',
                'browser_name',

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
                ]
            ]]); ?>
    </div>


</div>
