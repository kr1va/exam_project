<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
        <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-12">
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Назад', Yii::$app->request->referrer, ['class' => 'btn btn-warning']); ?>
        </div>
    </div>
    <div class="col-md-7">

        <!--    --><?//= $form->field($model, 'id')->textInput() ?>
        <?= $form->field($model, 'cat_name')->textInput() ?>

        <?= $form->field($model, 'browser_name')->textInput() ?>

    </div>
        <?php ActiveForm::end(); ?>

</div>
