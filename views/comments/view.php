<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\comments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view mt-4 p-4">

    <h4>Отзыв от <?= Html::encode($this->title) ?></h4>

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
    <div class="col-6">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-sm table-striped table-responsive'],
            'attributes' => [
                'id',
                'name',
                'email:email',
                'comment',
                'item_id',
            ],
        ]) ?>
    </div>


</div>
<div class="" style="height:50px;">
    <br>
</div>