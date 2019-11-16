<?php

use app\models\Category;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\OrderStatus;
use app\models\Delivery;
use app\models\PayMethods;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\order */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="order-form p-4">
<div class="row">
    <div class="col-md-10 ">
        <div class="form-group mt-2">
    <?php $form = ActiveForm::begin(); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'btn btn-warning']); ?>
        </div>
    </div>
<div class="col-md-4">

    <div class="col-md-12">
        <?= $form->field($model, 'name')->textInput(['readonly'=> true , 'placeholder'=>$model->name])->label(false) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'email')->textInput(['placeholder'=>$model->email])->label(false) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'phone')->textInput( ['placeholder'=>$model->phone])->label(false) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'adress')->textInput([ 'placeholder'=>$model->adress])->label(false) ?>
    </div>

    <div class="col-md-12">
        <?= Html::activeDropDownList($model, 'status',
            ArrayHelper::map(OrderStatus::find()->all(), 'status', 'browser_name'), ['class'=>'custom-select']) ?>
    </div>
    <div class="col-md-12">
            <?= Html::activeDropDownList($model, 'delivery',
                ArrayHelper::map(Delivery::find()->all(), 'method', 'browser_name'), ['class'=>'custom-select']) ?>
    </div>
    <div class="col-md-12">
            <?= Html::activeDropDownList($model, 'pay_method',
                ArrayHelper::map(PayMethods::find()->all(), 'pay_method', 'browser_name'), ['class'=>'custom-select']) ?>
    </div>
</div>

    <div class="col-md-7">
        <?= GridView::widget([
            'dataProvider' => $orderItems,
//        'filterModel' => $searchModel,
            'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'order_id',
//            'product_id',
                'name',
                'price',
                'qty',
                'sum',

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fa fa-trash"></span>', '/order/update?id='.$model->order_id.'&del_item='.$model->id, [
                                'title' => 'Delete',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' =>'Are you sure you want to delete this item?',
                                ]
                            ]);
                        },
//                ],
                    ],
                ],
            ],
        ]);
        ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>
</div>
<div class="" style="height:50px;">
    <br>
</div>