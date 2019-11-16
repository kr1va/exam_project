<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<article class="container mt-3">
<?=\app\widgets\MenuWidget::widget(); ?>

    <div class="row justify-content-center mt-3">
        <div class="col-sm-12  text-center">
            <h4 class="">Категория: <?= $item[0]['category']?></h4>
            <h5 class=""><?= Html::a( '< Назад', Yii::$app->request->referrer, ['class' => 'd-inline']); ?></h5>
        </div>
        <? foreach ($item as $product) {?>
            <section class="col-sm-9 mx-auto col-md-9 col-xl-4 my-3" >
                <div class="product card bg-white border-0 shadow " style="height:500px;">
                    <div class="mx-auto ">
                        <div class="zoom">
                            <div class="d-flex justify-content-center align-items-center overflow-auto">
                                <img class="rounded w-100"
                                     src="/img/<?=$product['img']?>" alt="<?=$product['img']?> here">
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-1 d-flex flex-column justify-content-between">
                        <div class="product-name card-title mt-1 text-center "><h3><?=$product['name']?></h3></div>
                        <div class="product-author card-text "><?=$product['contents']?></div>
                        <div class="product-price card-text text-left"><h4><i class="far fa-ruble-sign"></i>
                                <i class="fa fa-rub" aria-hidden="true"></i> <?=$product['price']?></h4></div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="product-buttons row ">
                            <div class="col-6">
                                <a href="#" data-name="<?=$product['link_name']?>" class="btn btn-success product-button__add  w-100">
                                    <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>
                            </div>
                            <div class="col-6 ">
                                <a href="<?= URL::to(['item/index', 'name'=>$product['link_name']]) ?>"  class="btn btn-outline-primary product-button__more w-100">
                                    <i class="far fa-info " aria-hidden="true"></i>
                                    Поробнее</a>
<!--                                --><?//= Html::a('Назад', ['index'], ['class' => ' btn btn-outline-warning']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <? } ?>
        <div class="col-sm-12 mt-3 text-center">
            <h5 class="d-inline ml-3"><?= Html::a( '< Назад', Yii::$app->request->referrer, ['class' => 'd-inline']); ?>
            </h5>
        </div>
    </div>

</article>
<div class="" style="height:80px;">
    <br>
</div>


