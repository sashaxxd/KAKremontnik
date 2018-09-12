<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\PasswordResetRequest */

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/registration.css', ['depends' => ['app\assets\AppAsset']]);
?>
<!--<div class="site-request-password-reset">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Пожалуйста, заполните свой адрес электронной почты. Здесь будет отправлена ​​ссылка на сброс пароля.</p>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-lg-5">-->
<!--            --><?php //$form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
<!--            --><?//= $form->field($model, 'email') ?>
<!--            <div class="form-group">-->
<!--                --><?//= Html::submitButton(('Send'), ['class' => 'btn btn-primary']) ?>
<!--            </div>-->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div id="reg_navi">
    <div id="navi">
        <div class="row">
            <div class="col-1">
                <div id="reg_Text2">
                    <span id="reg_uid0">Пожалуйста, заполните свой адрес электронной почты. Вам будет отправлена ​​ссылка на сброс пароля.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="reg_form_reg">
    <div id="form_reg">
        <div class="row">
            <div class="col-1">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <div id="reg_Text4">
                    <span id="reg_uid2">Электронная почта</span>
                </div>
                <?= $form->field($model, 'email')->textInput(['id' => 'Editbox2', 'placeholder' => 'Ваш email'])->label(false) ?>
                <div id="reg_LayoutGrid4">
                    <div id="LayoutGrid4">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" id="Button1" name="" value="Отправить">
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>
