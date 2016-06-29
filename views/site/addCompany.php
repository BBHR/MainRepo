<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <section class='reg-info-block'>
    <div class='info-block-data'>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
    </div>
    </section>
    <?php else: ?>
<!-- Контактная информация -->
<section class='reg-info-block'>
    <div class='info-block-data'>

       <?php
       $form = ActiveForm::begin([
           'enableClientValidation'=>true,
           'options' => ['data-pjax' => 1,],
           'layout' => 'horizontal',
           'fieldConfig' => [
               'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
               'horizontalCssClasses' => [
                   'label' => 'col-sm-3',
                   'offset' => 'col-sm-offset-4',
                   'wrapper' => 'data-row',
                   'error' => '',
                   'hint' => '',
               ],
           ],
       ]);
       echo $form->field($model, 'surName')->textInput(['maxlength' => 100, 'autofocus' => 'on', 'class' => 'input-long']);
       echo $form->field($model, 'firstName')->textInput(['maxlength' => 100, 'autofocus' => 'on', 'class' => 'input-long']);
       echo $form->field($model, 'secondName')->textInput(['maxlength' => 100, 'autofocus' => 'on', 'class' => 'input-long']);
       echo $form->field($model, 'email')->input('email')->textInput(['autofocus' => 'on', 'class' => 'input-long']);
       echo $form->field($model, 'phone')->widget(MaskedInput::classname(), ['mask' => '+7 (999)-999-99-99', 'type' => 'tel'])->textInput(['class' => 'input-long']);
       echo $form->field($model, 'pass')->passwordInput(['maxlength' => 32, 'autofocus' => 'on', 'class' => 'input-long']);
       echo $form->field($model, 'pass2')->passwordInput(['maxlength' => 32, 'autofocus' => 'on', 'class' => 'input-long']);

       echo $form->field($model, 'verifyCode')->widget(Captcha::className(),[
           //'template' => '{image}{input}',
           'template' => '<div class="row"><div class="col-lg-3">{image}</div>{input}',
           'imageOptions' => ['title' => 'Обновить', 'style' => 'cursor: pointer;'],
       ]);
?>
        <!-- <div class='data-row'>
            <label>Фамилия</label>
            <input type='text' class='input-long' placeholder="Фамилия"></input>
        </div>
        <div class='data-row'>
            <label>Имя</label>
            <input type='text' class='input-long' placeholder="Имя"></input>
        </div>
        <div class='data-row'>
            <label>Отчество</label>
            <input type='text' class='input-long' placeholder="Отчество"></input>
        </div>
        <div class='data-row'>
            <label>Email</label>
            <input type='email' class='input-long' placeholder="E-mail"></input>
        </div>
        <div class='data-row'>
            <label>Номер телефона</label>
            <input type='phone' value="+7(___)___-__-__" class='input-long'></input>
        </div>

        <div class='data-row'>
            <label>Пароль</label>
            <input type='password' class='input-long'></input>
        </div>
        <div class='data-row'>
            <label>Пароль ещё раз</label>
            <input type='password' class='input-long'></input>
        </div>
        -->
    </div>
</section>

<!-- Подтверждение -->
<section class='reg-info-block'>
    <div class='info-block-data'>
        <div class='checkbox-row'>
            <?php
            echo $form->field($model, 'check')->checkbox([
                'template' => "<div class=\" _md-container md-ink-ripple\">{input} <label> С <a href='#'> Условиями использования</a> сервиса и <a href='#'> Политикой конфиденциальности</a> ознакомлен. Даю согласие на обработку персональных данных.
            </label></div>\n\n<div class=\"col-lg-8\">{error}</div>",
                'class'=>'_md-icon','autofocus' => 'on']);
            ?>

        </div>
        <div class='button-row'>
            <?php
            echo Html::submitButton('Подтвердить', ['class' => 'standard-button','data-pjax'=> 1]);
            ?>
        </div>
    </div>
</section>
<?php
ActiveForm::end();
?>
<?php endif; ?>