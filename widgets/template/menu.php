<?
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-12 px-0">
        <div class="nav d-md-flex flex-column flex-md-row justify-content-start justify-content-md-around">
            <li class="nav-item rounded shadow-sm">
                <a href="/" class="nav-link">Все</a>
            </li>
            <?php foreach ($data as $id) {?>
                <li class="nav-item rounded shadow-sm">
                    <a  class="nav-link" href="
<?= Url::to(['category/view', 'id'=>$id['cat_name']]);?>
"><?= $id['browser_name'] ?></a>
                </li>
            <?php } ?>
        </div>
    </div>
</div>