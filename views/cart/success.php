<?

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\DetailView;
?>

<div class="container">
    <div class="col-md-8 mx-auto mt-4">
        <div class="text-center"><h3>Ваш заказ
<!--                №--><?//= $orderDetails[0]['id']?>
                принят!</h3></div>
        <p>Наш оператор свяжется с Вами в ближайшее время!</p>
        <div><a class="btn btn-success w-100" href="<?=URL::to(['/']) ?>">На главную</a></div>
    </div>
    <div class="row">
            <div class=" col-sm-12 col-md-4">
                <?= DetailView::widget([
                    'model' => $orderDetails[0],
                    'options'=> ['class' => 'table table-sm'],
                    'attributes' => [
                        ['label' => '№',
                        'attribute' => 'id'],
                        ['label' => 'Дата',
                            'attribute' => 'date'],
                        ['label' => 'Имя',
                            'attribute' => 'name'],
                        ['label' => 'E-mail',
                            'attribute' => 'email'],
                        ['label' => 'Телефон',
                            'attribute' => 'phone'],
                        ['label' => 'Адрес',
                            'attribute' => 'adress'],
                        ['label' => 'Сумма',
                            'attribute' => 'sum'],
                        ['label' => 'Доставка',
                            'attribute' => 'delivery'],
                        ['label' => 'Оплата',
                            'attribute' => 'pay_method'],
                        ['label' => 'Статус',
                            'attribute' => 'status'],
                    ],
                ]) ?>
            </div>
            <div class="col-sm-12 col-md-5">
                <?
                foreach ($orderItem as $item){?>
                    <?=DetailView::widget([
                        'model' => $item,
                        'options' => ['class' => 'table table-sm'],
                        'attributes' => [
                            ['label' => '',
                                'attribute' => 'name'],
                            ['label' => '',
                                'attribute' => 'price'],
                            ['label' => '',
                                'attribute' => 'qty'],
                            ['label' => '',
                                'attribute' => 'sum'],
                        ],
                    ])?>
                <?}
                ?>
            </div>

    </div>

</div>