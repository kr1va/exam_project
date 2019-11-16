<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact mt-4 p-4">
    <div class="text-center">
        <h4 class="text-center">Обратная связь</h4>
        <h5><?= Html::a( '< Назад', ['index'], ['class' => 'text-center']); ?></h5>
    </div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>
        <div class="row">
            <div class="col-sm-12 col-md-4 mt-4">
<!--                <p>-->
<!--                    Если у Вас возникли появились вопросы, пожалуйста свяжитесь с Нами используя эту форму.-->
<!--                    Спасибо.-->
<!--                </p>-->
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Имя'])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>
                <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Тема'])->label(false) ?>
                <?= $form->field($model, 'body')->textarea(['rows' => 4,
                    'placeholder' => 'Если у Вас возникли появились вопросы, пожалуйста свяжитесь с Нами используя эту форму. Спасибо.'])
                    ->label(false) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary w-100', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-sm-12 col-md-8 mb-3">
                <div id="root"></div>
            </div>

        </div>

    <?php endif; ?>
</div>
