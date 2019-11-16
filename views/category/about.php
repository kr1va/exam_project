<?php

use app\models\Info;
use yii\helpers\Html;
use app\models\Comments;
?>

<div class="container mt-5">
            <div class="text-center">
                <h3 class="text-center">О нас</h3>
                <h5><?= Html::a( '< Назад', Yii::$app->request->referrer, ['class' => '']); ?></h5>
            </div>
    <div class="row">
        <div class="col-sm-12 col-md-3 ">
            <p><?=Info::showInfo()['name']?> <?=Info::showInfo()['year']?></p>
            <p><a href="<?=Info::showInfo()['site']?>"><?=Info::showInfo()['site']?></a></p>
            <p> <?=Info::showInfo()['mail']?></p>
        </div>
        <div class="col-sm-12 col-md-6">
            <?=Info::showInfo()['other']?>
        </div>
        <div class="col-sm-12 col-md-3 ">
            <p class="float-right mb-1"><?= Yii::powered() ?></p>
        </div>
    </div>

</div>

<!--<div style="height:5rem;"></div>-->


