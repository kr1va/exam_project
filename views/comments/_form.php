<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form px-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder'=>'Имя', 'class'=> 'form-control w-25']) ?>

    <?= $form->field($model, 'email')->textInput(['class'=> 'form-control w-25']) ?>

    <?= $form->field($model, 'comment')->textArea(['class'=> 'form-control w-25']) ?>

    <?= $form->field($model, 'item_id')->textInput(['class'=> 'form-control w-25']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a( 'Назад', ['index'], ['class' => 'btn btn-warning']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
