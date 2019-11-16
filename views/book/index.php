
<?//var_dump($item)
use yii\helpers\Html;
use yii\helpers\Url; ?>


<div class="col-md-6 mt-4 mx-auto">
    <div class="product card bg-white border-0 shadow pt-2 " style="height: 450px;">
        <div class="product-img mx-auto">
            <img class="rounded border-0" style="widht:200px; height:200px;" src="/img/<?=$item['img']?>" alt="product image here">
        </div>
        <div class="card-body" >
            <div class="list-group ">
                <h4 class="product-name card-title mb-1"><?=$item['name']?></h4>
                <div class="product-author card-text text-right"><?=$item['author']?></div>
                <div class="product-descr card-text "><?=$item['description']?></div>
                <h5 class="product-price card-text text-left mt-3"><i class="fa fa-rub" aria-hidden="true"></i> <?=$item['price']?></h5>
            </div>
        </div>
        <div class="card-footer bg-white " >
            <div class="product-buttons row" >
                <div class="col-6 " >
                    <a href="#" data-name="<?=$item['link_name']?>"  class="btn btn-outline-success product-button__add w-100 align-bottom" >
                        <i class="fa fa-check fa-fw " aria-hidden="true"></i>Заказать</a>
                </div>
                <div class="col-6" >
                    <?= Html::a( 'Назад', Yii::$app->request->referrer, ['class' => 'btn btn-outline-warning w-100']); ?>
                </div>

            </div>
        </div>
    </div>
</div>