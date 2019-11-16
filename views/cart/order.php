<?

use app\models\Delivery;
use app\models\PayMethods;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

        <? $form = ActiveForm::begin(['class'=>'w-50']) ?>
        <div class="form-group w-100 m-1">
            <h5>Реквизиты заказа :</h5>
        </div>
        <div class="form-group w-100 m-1">
            <?= $form->field($order, 'name')->textInput(['placeholder'=>'Имя'])->label(false);?>
        </div>
        <div class="form-group w-100 m-1">
            <?= $form->field($order, 'email')->textInput(['placeholder'=>'E-mail'])->label(false);?>
        </div>
        <div class="form-group w-100 m-1">
        <?= $form->field($order, 'phone')->textInput(['placeholder'=>'Телефон'])->label(false);?>
        </div>
        <div class="form-group w-100 m-1">
        <?= $form->field($order, 'adress')->textInput(['placeholder'=>'Адрес'])->label(false);?>
        </div>
<!--        <div class="form-group w-50 m-1">-->
<!--            --><?//= Html::activeDropDownList($order, 'delivery',
//                ArrayHelper::map(Delivery::find()->all(), 'method', 'browser_name'), ['class'=>'custom-select']) ?>
<!--        </div>-->
<!--        <div class="form-group w-50 m-1">-->
<!--            --><?//= Html::activeDropDownList($order, 'pay_method',
//                ArrayHelper::map(PayMethods::find()->all(), 'pay_method', 'browser_name'), ['class'=>'custom-select']) ?>
<!--        </div>-->
        <div class="form-group w-100 m-1">
             <?= $form->field($order, 'delivery')->radioList(
                 ArrayHelper::map(Delivery::find()->all(), 'method', 'browser_name')
                 ) ?>
        </div>
        <div class="form-group w-100 m-1">
            <?= $form->field($order, 'pay_method')->radioList(
                ArrayHelper::map(PayMethods::find()->all(), 'pay_method', 'browser_name')
            ) ?>
        </div>
        <div class="form-group w-50 m-1">
        <button class="btn btn-success">Оформить заказ!</button>
        </div>
        <? $form = ActiveForm::end() ?>