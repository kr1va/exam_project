
<?use yii\helpers\Url; ?>

<?//var_dump($_SESSION['user']);?>
<?//print_r(Yii::$app->controller->route)?>
<?//print_r(Yii::$app->defaultRoute)?>

<aside class="col-md-12 mt-4 px-1 ">
    <div class="slick px-1 mx-auto">
        <div class=" d-flex" >
            <img class="mx-auto img img-fluid " src="/img/slider/slide1.png" alt="Slide1">
<!--            <img class="mx-auto img img-fluid  " src="/img/slide1.png" alt="Slide1">-->
        </div>
        <div class="" >
            <img class="mx-auto img img-fluid" src="/img/slider/slide2.png" alt="Slide2">
        </div>
        <div class="" >
            <img class="mx-auto img img-fluid" src="/img/slider/slide3.png" alt="Slide3">
        </div>
    </div>
<!--    <div class="slick-prev">a</div>-->
<!--    <div class="slick-next">b</div>-->

<div class="mt-2 px-4"> <?=\app\widgets\MenuWidget::widget(); ?></div>
</aside>

<article class="container-fluid mt-3">
    <div class="row">
        <? foreach ($items as $item) {?>
        <section class="col-sm-9 mx-auto col-md-6 col-xl-4 my-3" >
            <div class="product card bg-white border-0 shadow " style="height:500px;">
                <div class="mx-auto ">
                    <div class="zoom">
                        <div class="d-flex justify-content-center align-items-center overflow-auto">
                        <img class="rounded w-100"
                             src="/img/<?=$item['img']?>" alt="<?=$item['img']?> here">
                        </div>
                    </div>
                </div>
                <div class="card-body py-1 d-flex flex-column justify-content-between">
                 <div class="product-name card-title text-center "><h3><?=$item['name']?></h3></div>
                 <div class="product-author card-text "><?=$item['contents']?></div>
<!--                 <div class="product-descr card-text text-left">--><?//=$item['description']?><!--</div>-->
                 <div class="product-price card-text text-left"><h4>
                         <i class="far fa-ruble-sign"></i>
                          <?=$item['price']?></h4></div>
                </div>
                <div class="card-footer bg-white fixed">
                    <div class="product-buttons row ">
                        <div class="col-6">
                            <a href="#" data-name="<?=$item['link_name']?>" class="btn btn-success  product-button__add  w-100">
                                <i class="fa fa-check fa-fw d-none d-md-inline" aria-hidden="true"></i>Заказать</a>
                        </div>
                        <div class="col-6 ">
                            <a href="<?= URL::to(['item/index', 'name'=>$item['link_name']]) ?>" class="btn btn-outline-primary  px-0 px-md-1 product-button__more w-100">
                                <i class="far fa-info d-none d-md-inline" aria-hidden="true"></i>
                                Поробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <? } ?>
    </div>
</article>
<div class="" style="height:80px;">
    <br>
</div>
