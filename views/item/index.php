
<?//var_dump($item)
use yii\helpers\Html;
use yii\helpers\Url; ?>

<section class="col-sm-9 d-none d-md-block mx-auto col-md-12 col-xl-12 my-3" >
                <div class="product bg-white border-0 shadow pt-2 row" >
                    <div class="product-img col-5" >
                        <div class="zoom">
                            <img class="rounded  w-100 h-75 my-4 img-fluid d-md-none d-lg-inline" style="widht:150px; height:150px;" src="/img/<?=$item['img']?>" alt="<?=$item['img']?> here">
                            <img class="rounded  mx-auto mx-auto my-5 img-fluid d-lg-none " style="widht:150px; height:150px;" src="/img/<?=$item['img']?>" alt="product image here">
                        </div>
                    </div>
                    <div class="col-7 py-3 d-flex flex-column justify-content-between">
                        <div class="  mt-1 text-center "><h2><?=$item['name']?></h2></div>
                        <div class=""><h4><?=$item['contents']?></h4></div>
                        <div class=" my-1"><h5><?=$item['description']?></h5></div>
                        <div class="text-left"><h4><i class="far fa-ruble-sign"></i>
                                <i class="fa fa-rub" aria-hidden="true"></i> <?=$item['price']?></h4>
                        </div>
                        <div class=" bg-white">
                            <div class="product-buttons row">
                                <div class="col-6">
                                    <a href="#" data-name="<?=$item['link_name']?>" class="btn btn-success product-button__add  w-100">
                                        <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>
                                </div>
                                <div class="col-6 ">
                                    <?= Html::a('< Назад', Yii::$app->request->referrer, ['class' => ' btn btn-outline-warning w-100']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


<section class="d-sm-block d-md-none  mx-auto col-xl-4 my-3" >
    <div class="product card bg-white border-0 shadow pt-2" >
        <div class="product-img mx-auto ">
            <img class="rounded border-0 img-fluid boxShadow4" style="widht:150px; height:150px;" src="/img/<?=$item['img']?>" alt="product image here">
        </div>
        <div class="card-body py-1 d-flex flex-column justify-content-between">
            <div class=" card-title mt-1 text-center "><h3><?=$item['name']?></h3></div>
            <div class=" card-text "><h5><?=$item['contents']?></h5></div>
            <div class=" card-text my-1"><h5><?=$item['description']?></h5></div>
            <div class=" card-text text-left"><h4><i class="far fa-ruble-sign"></i>
                    <i class="fa fa-rub" aria-hidden="true"></i> <?=$item['price']?></h4></div>
        </div>
        <div class="card-footer bg-white">
            <div class="product-buttons row">
                <div class="col-6">
                    <a href="#" data-name="<?=$item['link_name']?>" class="btn btn-success product-button__add  w-100">
                        <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>
                </div>
                <div class="col-6 ">
                    <?= Html::a('< Назад', Yii::$app->request->referrer, ['class' => ' btn btn-outline-warning w-100']); ?>
                </div>
            </div>
        </div>
    </div>
</section>



<!--<div class="col-md-6 mt-4 mx-auto">-->
<!--    <div class="product card bg-white border-0 shadow pt-2 --sized" >123-->
<!--        <div class="product-img mx-auto">-->
<!--            <img class="rounded border-0" style="widht:200px; height:200px;" src="/img/--><?//=$item['img']?><!--" alt="product image here">-->
<!--        </div>-->
<!--        <div class="card-body d-flex flex-column justify-content-between" >-->
<!--            <div class="list-group ">-->
<!--                <h4 class="product-name card-title mb-1">--><?//=$item['name']?><!--</h4>-->
<!--                <div class="product-author card-text my-2">--><?//=$item['contents']?><!--</div>-->
<!--                <div class="product-descr card-text my-2">--><?//=$item['description']?><!--</div>-->
<!--                <div class="product-price card-text text-left my-2">-->
<!--                    <h5 class=""><i class="fa fa-rub" aria-hidden="true"></i> --><?//=$item['price']?><!--</h5>-->
<!---->
<!--                </div>-->


<!--        </div>-->
<!--        <div class="card-footer bg-white " >-->
<!--            <div class="product-buttons row" >-->
<!--                <div class="col-6 " >-->
<!--                    <a href="#" data-name="--><?//=$item['link_name']?><!--"  class="btn btn-outline-success product-button__add w-100 align-bottom" >-->
<!--                        <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>-->
<!--                </div>-->
<!--                <div class="col-6" >-->
<!--                    --><?//= Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-warning w-100']); ?>
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>