<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\models\Info;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>
        <?= Html::encode(Info::showInfo()['name']) ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <header class="container">


            <navbar class="header row">
                <nav class="bg-white  navbar fixed-top navbar-expand-md px-md-5 px-3 py-1 pb-1 shadow-sm">
                    <a class="navbar-brand d-none d-md-inline" href="/">
                        <img src="/img/logo.png" alt="Logo" style="widht:45px; height: 45px;">
                    </a>
                        <h1 class="d-none d-md-inline"><?=Info::showInfo()['name']?></h1>
                    <div class="mr-auto pl-0 d-sm-block d-md-none">
                        <a class="nav-link button__body" title="Корзина" id="cart" onClick="openCart(event)" href="#" data-placement="bottom">
                            <i class="far fa-shopping-cart fa-2x" aria-hidden="true"></i>
                            <span class="menuQty button__badge">(<?=$_SESSION['cart.totalQty'] ? $_SESSION['cart.totalQty'] : ('0')?>)</span>
                        </a>
                    </div>
                    <a class="navbar-brand d-inline d-md-none" href="/">
                        <img src="/img/logo.png" alt="Logo" style="widht:45px; height: 45px;">
                    </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="far fa-bars fa-2x text-primary" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mr-md-0 ml-md-auto">
                            <li class="nav-item px-3  mx-1 mx-md-0 px-md-0">
                                <a class='nav-link' href="/" title="На главную" ><i class="far fa-home-alt fa-2x" aria-hidden="true"></i>
                                    <span class=" d-sm-inline d-md-none"> Домой</span>
                                </a>
                            </li>
                            <li class="nav-item px-3 mx-1 mx-md-0 px-md-0">
                                <a class='nav-link' title="О нас" href="<?= URL::to(['category/about']) ?>">
                                    <i class="far fa-info-circle fa-2x" aria-hidden="true"></i>
                                    <span class=" d-sm-inline d-md-none"> О нас</span>
                                </a>
                            </li>
                            <li class="nav-item px-3 mx-1 mx-md-0 px-md-0">
                                <a class='nav-link' title="Обратная связь" href="<?= URL::to(['category/contact']) ?>">
                                    <i class="far fa-comments fa-2x" aria-hidden="true"></i>
                                    <span class=" d-sm-inline d-md-none"> Обратная связь</span>
                                </a>
                            </li>
                            <li class="nav-item px-3 mx-1 mx-md-0 px-md-0 d-none d-md-inline">
                                <a class="nav-link button__body" title="Корзина" id="cart" onClick="openCart(event)" href="#" data-placement="bottom">
                                    <i class="far fa-shopping-cart fa-2x" aria-hidden="true">
                                    </i>
                                    <span class="menuQty button__badge">(<?=$_SESSION['cart.totalQty'] ? $_SESSION['cart.totalQty'] : ('0')?>)</span>
                                    <span class=" d-sm-inline d-md-none"> Корзина </span>
                                </a>
                            </li>
                            <li class="d-none d-md-block">
                                <form action="<?= URL::to(['category/search']) ?>" class="form-inline d-flex flex-row my-2 my-lg-1" method="get">
                                    <input class="form-control my-sm-0 w-75" type="search" placeholder="Введите название..." name="search">
                                    <button class="btn btn-outline-success w-25 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>
                            <? if($_SESSION['user']){?>
                                <?='<li class="nav-item px-3 mx-1 mx-md-0 px-md-0" title="Админка">'?>
                                <?=Html::a('<i class="far fa-users-cog fa-2x mt-2 ml-1" aria-hidden="true"></i><span class=" d-sm-inline d-md-none"> Админка</span>',
                                    Url::to(['admin/select']))?>
                                <?='</li>
                                <li class="nav-item px-3 mx-1 mx-md-0 px-md-0" title="Выход">'?>
                                <?=Html::a('<i class="far fa-sign-out-alt fa-2x" aria-hidden="true" ></i><span class="d-sm-inline d-md-none"> Выход</span>',
                                    Url::to(['users/logout', 'user' => $_SESSION['user']]), ['class'=> 'nav-link mx-sm-auto','data-method' => 'POST'])?>
                                <?='</li>'?>
                            <?} else {?>
                                <?='<li class="nav-item px-3 mx-1 mx-md-0 px-md-0">
                        <a class="nav-link" id="login" onClick="showLogin(event)" href="#">
                        <i class="far fa-sign-in-alt fa-2x" aria-hidden="true" title="Вход"></i>
                        <span class=" d-sm-inline d-md-none"> Вход</span>
                        </a>
                    </li>'?>
                            <?}?>
                            <li class="d-sm-inline d-md-none px-0">
                                <form action="<?= URL::to(['category/search']) ?>"
                                      class="form-inline w-75 d-flex flex-row my-2 my-lg-2 mx-auto btn-group" method="get">
                                    <input class="form-control my-sm-0 d-flex w-75 mxauto" type="search" placeholder="Введите название..." name="search">
                                    <button class="btn btn-outline-success ml-1 w-25 my-sm-0 mx-auto" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>
                        </ul>

                    </div>
                </nav>
            </navbar>
    </header>

    <main class="container-fluid pt-5 px-sm-0 bg-white" id="site-content">
        <?= $content ?>
    </main>

<div class="modal fade bd-example-modal-md p-0" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-2">
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg p-0" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-2">

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm p-0" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content p-2">
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg p-0" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
        </div>
     </div>
</div>



<footer class="footer" >
    <div class="container-fluid bg-dark" id="site-footer">
        <div class="row my-2">
            <div class="col-sm-12 col-md-3 text-white">
                <p><?=Info::showInfo()['name']?> <?=Info::showInfo()['year']?></p>
                <p><a href="<?=Info::showInfo()['site']?>"><?=Info::showInfo()['site']?></a></p>
                <p> <?=Info::showInfo()['mail']?></p>
            </div>
            <div class="col-sm-12 col-md-6 text-white">
                <?=Info::showInfo()['other']?>
            </div>
            <div class="col-sm-12 col-md-3 text-white">
                <p class="float-right mb-1"><?= Yii::powered() ?></p>
            </div>
            <div class="col-12 text-center my-3">
                <img src="/img/logo.png" alt="Logo" style="widht:100px; height: 100px;">
            </div>
        </div>
    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
