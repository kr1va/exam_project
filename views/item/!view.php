
<?//var_dump($item)
use yii\helpers\Url; ?>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="product text-center">
            <h2><div class="product-name"><?=$book['name']?></div></h2>
            <div class="product-img">
                <img src="/img/<?=$book['img']?>" alt="product image here">
            </div>
<!--            <div class="product-name">Name: --><?//=$item['name']?><!--</div>-->
            <div class="product-author">Автор: <?=$book['contents']?></div>
            <div class="product-descr">Описание: <?=$book['description']?></div>
            <div class="product-price">Цена: <?=$book['price']?> rub</div>
            <div class="product-buttons">
                <button data-name="<?=$book['link_name']?>" class="product-button__add btn btn-outline-success">Заказать</button>

            </div>
        </div>
    </div>
</div>

<div class="col-md-4 my-3" >
    <div class="product card bg-white border-0 shadow" style="height: 400px;">
        <div class="product-img ">
            <img class="img-thumbnail card-img-top rounded border-0" style="widht:150px; height:150px;" src="/img/<?=$book['img']?>" alt="product image here">
        </div>
        <div class="card-body">
            <div class="list-group text-right">
                <h4 class="product-name card-title mb-1"><?=$book['name']?></h4>
                <div class="product-author card-text "><?=$book['contents']?></div>
                <div class="product-descr card-text "><?=$book['description']?></div>
                <h5 class="product-price card-text text-left"><i class="fa fa-rub" aria-hidden="true"></i> <?=$book['price']?></h5>
                <div class="product-buttons row position-bottom">
                    <div class="col-6">
                        <a href="#" data-name="<?=$book['link_name']?>"  class="btn btn-outline-success product-button__add  w-100">
                            <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>
                    </div>
                    <div class="col-6 ">
                        <a href="<?= URL::to(['item/index', 'name'=>$book['link_name']]) ?>"  class="btn btn-outline-primary product-button__more w-100">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            Поробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>