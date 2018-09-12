<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user mdm\admin\models\User */

$resetLink = Url::to(['reset-password','token'=>$user->password_reset_token], true);
?>
Привет <?= $user->username ?>,

Перейдите по ссылке для смены пароля:

<?= $resetLink ?>
