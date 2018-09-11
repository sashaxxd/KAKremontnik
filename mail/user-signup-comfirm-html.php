<?php
use yii\helpers\Html;



$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signup-confirm', 'token' => $user->email_confirm_token]);
?>
<div class="password-reset">
    <p> Привет <?= Html::encode($user->username) ?>,</p>

    <p>Перейдите по ссылке для подтверждения email:</p>

    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>