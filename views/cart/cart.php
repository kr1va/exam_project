<h3 class="text-center"><span class="far fa-shopping-cart fa-2x" aria-hidden="true"></span> </h3>
<?

if ($session['cart']) {
?>
<table class="table-sm table-striped mx-auto">
    <thead class="">
    <tr class="">
        <th scope="col" class="d-none d-md-inline-block p-md-3"></th>
        <th scope="col" class="p-1 p-md-3">Наименование</th>
        <th scope="col" class="p-1 d-inline d-md-none"></th>
        <th scope="col" class="p-1 p-md-3">Шт.</th>
        <th scope="col" class="p-1 p-md-3">Цена</th>
        <th scope="col" class="p-1 p-md-3"></th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($session['cart'] as $id => $item) {?>
        <tr>
            <td class="d-none d-md-block p-1 p-md-2" width="100">
                <img class="" src="/img/<?=$item['img']?>" style="width: 50px; height: 50px;" alt="img here">
            </td>
            <td class="p-1 p-md-3"><?=$item['name']?></td>
            <td class="p-1 d-inline d-md-none"></td>
            <td class="p-1 p-md-3"><?=$item['qty']?><span class=p-1 p-md-3 d-block d-md-none">шт</span> </td>
            <td class="p-1 p-md-3"><i class="fa fa-rub fa-lg" aria-hidden="true"></i>
                <?=$item['price']*$item['qty']?></td>
            <td class="delete text-center text-danger" data-id="<?=$id?>" style="center; cursor:pointer; vertical-align: middle;">
                <i class="fa fa-times-circle text-danger fa-2x" aria-hidden="true"></i>

            </td>
        </tr>
    <?}?>
        <tr style="border-top: 4px solid black;">
            <td class="p-0 p-md-3" colspan="4">Всего товаров: </td>
            <td class=" p-0 p-md-3 totalQty" style="font-weight: 700;"><?=$session['cart.totalQty'] ?></td>
        </tr>
    <tr class="p-0 p-md-3">
        <td class="p-0 p-md-3" colspan="4">На сумму: </td>
        <td class="p-0 p-md-3" style="font-weight: 700;"><?=$session['cart.totalSum'] ?> руб.</td>
    </tr>
    </tbody>
</table>
<div class="modal-buttons btn-group d-flex justify-content-between p-3 p-md-0">
    <button type="button" class="btn btn-outline-danger p-0 p-md-1" onclick="clearCart(event)"><i class="far fa-trash d-none d-md-inline"></i>Очистить корзину</button>
    <button type="button" class="btn btn-outline-secondary btn-close p-0 p-md-1">Продолжить покупки</button>
    <button type="button" class="btn btn-success btn-next p-0 p-md-1"><i class="fa fa-check fa-fw d-none d-md-inline" aria-hidden="true"></i>Оформить заказ</button>
</div>
    <?} else { ?>
<h4 class="text-center">Пока пусто...</h4>
<button type="button" class="btn btn-outline-secondary w-50 mx-auto btn-close">Начать покупки</button>
<?}?>
