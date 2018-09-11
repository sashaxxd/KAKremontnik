<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wb_header">
    <div id="header">
        <div class="row">
            <div class="col-1">
                <div id="wb_logo">
                    <img src="/images/brain.png" id="logo" alt="">
                </div>
            </div>
            <div class="col-2">
                <div id="wb_name">
                    <span id="wb_uid0">Cпециалист.ру</span>
                </div>
            </div>
            <div class="col-3">
                <div id="wb_menu">
                    <label class="toggle" for="menu-submenu" id="menu-title"><span id="menu-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
                    <input type="checkbox" id="menu-submenu">
                    <ul class="menu" id="menu">
                        <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                        <li><a href="http://">Войти</a></li>
                        <li><a href="<?= \yii\helpers\Url::to('signup')?>">Регистрация</a></li>
                        <li><a href="http://">Заказы</a></li>
                        <li><a href="http://">О проекте</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        <?= $content ?>

<div id="wb_LayoutGrid5">
    <div id="LayoutGrid5">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
