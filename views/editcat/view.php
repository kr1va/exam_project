<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\category */

$this->title = $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view mt-4 p-4">

    <h3> Категория <?= Html::encode($this->title) ?></h3>
    <p>
        <?= Html::a('Обновиь', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a( 'Назад', ['index'], ['class' => 'btn btn-warning'])?>
    </p>

<div class="col-md-7">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cat_name',
            'browser_name:ntext',
        ],
    ]) ?>
</div>

</div>
