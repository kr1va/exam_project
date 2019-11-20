<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error pt-4">

<!--    <h3 class="text-center">--><?//= Html::encode($this->title) ?><!--</h3>-->
    <div class="alert alert-danger text-center">
        <h3><?= nl2br(Html::encode($message)) ?> (<?= Html::encode($this->title) ?>) </h3>
    </div>

    <div class="text-center">
        <h5><?= Html::a('< Назад', '/',['class'=>'d-inline']);?></h5>
    </div>
        <div class="text-center">
            <img class="img img-fluid w-50 mx-auto" src="/img/sleeping-kitten.gif" alt="Sleeping kitten here...">
        </div>
    <div class="'text-center pb-3">
        <p>
            При обработке Вашего запроса возникла ошибка!
        </p>
        <p>
            Пожалуйста свяжитесь с нами, если вы считаете что это ошибка сервера.
        </p>
        <p>
            Спасибо.
        </p>
    </div>

</div>
