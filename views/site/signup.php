<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/registration.css', ['depends' => ['app\assets\AppAsset']]);
?>
<!--<div class="site-signup">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to signup:</p>-->
<!--    --><?//= Html::errorSummary($model)?>
<!--    <div class="row">-->
<!--        <div class="col-lg-5">-->
<!--            --><?php //$form = ActiveForm::begin(['id' => 'form-signup']); ?>
<!--                --><?//= $form->field($model, 'username') ?>
<!--                --><?//= $form->field($model, 'email') ?>
<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
<!--                <div class="form-group">-->
<!--                    --><?//= Html::submitButton(('Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
<!--                </div>-->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div id="reg_navi">
    <div id="navi">
        <div class="row">
            <div class="col-1">
                <div id="reg_Text2">
                    <span id="reg_uid0">Регистрация подрядчика (мастера, бригады или компании)</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="reg_form_reg">
    <div id="form_reg">
        <div class="row">
            <div class="col-1">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div id="reg_Text3">
                    <span id="reg_uid1">Контактное лицо</span>
                </div>

                <?= $form->field($model, 'username')->textInput(['id' => 'Editbox1', 'placeholder' => 'Ваше имя'])->label(false) ?>
                <div id="reg_Text4">
                    <span id="reg_uid2">Электронная почта</span>
                </div>

                <?= $form->field($model, 'email')->textInput(['id' => 'Editbox2', 'placeholder' => 'Ваш email'])->label(false) ?>
                <div id="reg_Text4">
                    <span id="reg_uid2">Пароль</span>
                </div>

                <?= $form->field($model, 'password')->passwordInput(['id' => 'Editbox3', 'placeholder' => 'Пароль'])->label(false) ?>
                <div id="reg_Text5">
                    <span id="reg_uid3">Я согласен с правилами сервиса</span>
                </div>
<!--                <div id="reg_Checkbox1">-->
<!--                    <input type="checkbox" id="Checkbox1" name="Checkbox1" value="on"><label for="Checkbox1"></label>-->
                    <?php  echo $form->field($model, 'regulations')->checkbox(['value' => 1,  'template'=> '<div id="reg_Checkbox1">{input} <label for="Checkbox1"></label>   </div>{error}', 'label' => null])->label(false) ?>
<!--                </div>-->
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
                <input type="submit" id="Button1" name="" value="Продолжить регистрацию">
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>
