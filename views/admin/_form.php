<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
//use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'btn btn-warning']); ?>
            <!--        --><?//= Html::button('Back', Yii::$app->request->referrer)?>
        </div>
    </div>
    <div class="col-md-7">

        <?php
        if(isset($model->img) && file_exists('img/'.$model->img))
        {
            echo Html::img(
                '/img/'.$model->img, ['class'=>'img-responsive', 'style'=>'width:100px;']);
            echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
        }
        ?>
        <div class="input-group mb-3 mt-4">
            <div class="custom-file">
                <?= $form->field($model, 'image')->fileInput(['class'=>'custom-file',]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-7 my-2">
        <?= Html::activeDropDownList($model, 'category',
        ArrayHelper::map(Category::find()->all(), 'cat_name', 'browser_name'), ['class'=>'custom-select']) ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'name')->textInput(['placeholder'=>'Название'])->label(false) ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'contents')->textInput(['placeholder'=>'Состав'])->label(false) ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'description')->textInput(['placeholder'=>'Описание'])->label(false) ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'price')->textInput(['placeholder'=>'Цена'])->label(false) ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'link_name')->textInput(['placeholder'=>'Имя ссылки'])->label(false) ?>
    </div>

</div>

    <?php ActiveForm::end(); ?>
</div>
</div>
<div class="" style="height:50px;">
    <br>
</div>