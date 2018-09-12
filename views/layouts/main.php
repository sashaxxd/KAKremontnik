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
<div class="wrapper">
<div class="content">
<div id="site_header">
    <div id="header">
        <div class="row">
            <div class="col-1">
                <div id="site_logo">
                    <img src="/images/brain.png" id="logo" alt="">
                </div>
            </div>
            <div class="col-2">
                <div id="site_name">
                    <span id="site_uid0">Cпециалист.ру</span>
                </div>
            </div>
            <div class="col-3">
                <div id="site_menu">
                    <label class="toggle" for="menu-submenu" id="menu-title"><span id="menu-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
                    <input type="checkbox" id="menu-submenu">
                    <ul class="menu" id="menu">
                        <li><a href="<?= \yii\helpers\Url::home()?>">Главная</a></li>
                        <?php  if(Yii::$app->user->isGuest): ?>
                        <li><a href="<?= \yii\helpers\Url::to('login')?>">Войти</a></li>
                        <?php else: ?>
                        <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">Выйти</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">

                                    Ваш кабинет </a></li>
                        <?php endif; ?>
                        <?php  if(Yii::$app->user->isGuest): ?>
                        <li><a href="<?= \yii\helpers\Url::to('signup')?>">Регистрация</a></li>
                        <?php else: ?>
                        <?php endif; ?>

                        <li><a href="http://">Заказы</a></li>

                        <li><a href="http://">О проекте</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Флеш сообщения -->

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div id="mess_msg-cntain">
        <div id="msg-cntain">
            <div class="row">
                <div class="col-1">
                    <div id="mess_message_ok">
                        <div id="message_ok">
                            <div class="row">
                                <div class="col-1">
                                    <div id="mess_message_text">
                                        <span id="mess_uid0"><?php echo Yii::$app->session->getFlash('success'); ?></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div id="mess_message_close">
                                        <div id="message_close"><i class="fa fa-window-close">&nbsp;</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div id="message_msg-cntain-error">
        <div id="msg-cntain-error">
            <div class="row">
                <div class="col-1">
                    <div id="message_message_error">
                        <div id="message_error">
                            <div class="row">
                                <div class="col-1">
                                    <div id="message_message_error_text">
                                        <span id="message_uid0"><?php echo Yii::$app->session->getFlash('error'); ?></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div id="message_message_close_error">
                                        <div id="message_close_error"><i class="fa fa-window-close">&nbsp;</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



        <?= $content ?>
</div>
    <div class="footer">
<div id="site_LayoutGrid5">
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
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
