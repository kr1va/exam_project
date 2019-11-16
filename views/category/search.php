<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<atricle class="container mt-5">
    <div class="text-center">
        <h4 class="">Результаты поиска по запросу "<?=$search;?>"</h4>
        <h5 class=""><?= Html::a( '< Назад', Yii::$app->request->referrer, ['class' => 'd-inline']); ?></h5>
    </div>
    <div class="row justify-content-center">
        <? if ($items) {
        foreach ($items as $item) {?>
            <section class="col-sm-9 mx-auto col-md-6 col-xl-4 my-3 ">
                <div class="product card bg-white border-0 shadow " style="height:500px;">
                    <div class="mx-auto ">
                        <div class="zoom">
                            <div class="d-flex justify-content-center align-items-center overflow-auto">
                                <img class="rounded w-100"
                                     src="/img/<?=$item['img']?>" alt="<?=$item['img']?> here">
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="product-name card-title mb-1"><h4><?=$item['name']?></h4></div>
                        <div class="product-author card-text "><?=$item['contents']?></div>
                        <div class="product-price card-text text-left">
                            <h5> <i class="far fa-ruble-sign"></i> <?=$item['price']?></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="product-buttons row">
                            <div class="col-6">
                                <a href="#" data-name="<?=$item['link_name']?>" class="btn btn-success product-button__add  w-100">
                                    <i class="fa fa-check fa-fw d-none d-md-inline" aria-hidden="true"></i>Заказать</a>
                            </div>
                            <div class="col-6 ">
                                <a href="<?= URL::to(['item/index', 'name'=>$item['link_name']]) ?>" class="btn btn-outline-primary product-button__more w-100">
                                    <i class="far fa-info d-none d-md-inline" aria-hidden="true"></i>
                                    Поробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <? }} else { ?>
           <h4> Ничего не найдено(((</h4>
            <h5 class=""><?= Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'd-inline']); ?></h5>

        <? } ?>

    </div>
        <h5 class="text-center"><?= Html::a( '< Назад', Yii::$app->request->referrer, ['class' => 'd-inline']); ?></h5>
</atricle>
<!--<div class="" style="height:80px;">-->
<!--    <br>-->
<!--</div>-->
