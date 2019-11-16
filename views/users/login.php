<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<? $form = ActiveForm::begin() ?>

<?= $form->field($model, 'name')->textInput(['id'=>'name', 'placeholder'=>'Имя'])->label(false);?>
<?= $form->field($model, 'pass')->passwordInput(['id'=>'pass', 'placeholder'=>'Пароль'])->label(false);?>
<?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <button class="btn btn-success btn-login w-100 mx-auto">Enter</button>
<? $form = ActiveForm::end() ?>
