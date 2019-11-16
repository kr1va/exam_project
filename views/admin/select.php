<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-md-4 my-4 p-4">
    <h3>Выберете действие: </h3>
</div>
<div class="row p-1">
    <div class="col-md-3">
        <?= Html::a( 'Редактировать Заказы', URL::to(['order/index']), ['class' => 'btn btn-lg btn-success p-3']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a('Редактировать товары', ['index'], ['class' => 'btn btn-lg btn-success p-3']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a( 'Редактировать категории', URL::to(['editcat/index']), ['class' => 'btn btn-lg btn-success p-3 ']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a( 'Отзывы пользователей', URL::to(['comments/index']), ['class' => 'btn btn-lg btn-success p-3']) ?>
    </div>


</div>
<div class="">
<h5 class="text-center"> <?= Html::a( '< Назад', URL::to(['category/index']), ['class' => ''])?></h5>
</div>
<!--<button class="btn btn-secondary">Add items</button>-->