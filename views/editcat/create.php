<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\category */

$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
