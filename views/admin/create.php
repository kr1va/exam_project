<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create p-4">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
