<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view mt-4 p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Создать еще', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],

        ]) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-warning']); ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-sm table-responsive'],
        'attributes' => [
            'id',
            'category',
            'name',
            'contents',
            'description',
            'price',
            'img',
            'link_name:ntext',
        ],
    ]) ?>

</div>
<div class="" style="height:50px;">
    <br>
</div>