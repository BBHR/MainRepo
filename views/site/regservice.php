<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<!-- Контактная информация -->
<section class='reg-info-block'>
  <div class='info-block-data'>
      <?php $form = ActiveForm::begin(); ?>
      
      <?= $form->field($model, 'user_surname', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Фамилия']])->textInput()?>
      
      <?= $form->field($model, 'user_name', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Имя']])->textInput()?>
      
      <?= $form->field($model, 'user_patronymic', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Отчество']])->textInput()?>
      
      <?= $form->field($model, 'user_email', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'E-mail']])->textInput()?>
      
      <?= $form->field($model, 'user_phone_number', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => '+7(___)___-__-__']])->textInput()?>
      
      <?= $form->field($model, 'user_password', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long']])->passwordInput()?>
      
      <?= $form->field($model, 'rePassword', ['options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long']])->passwordInput()?>
      
      <?php ActiveForm::end(); ?>

  </div>
</section>

<!-- Подтверждение -->
<section class='reg-info-block'>
  <div class='info-block-data'>
      <!--
    <div class='checkbox-row'>
      <input type='checkbox'>
      <label> С <a href='#'> Условиями использования</a> сервиса и <a href='#'> Политикой конфиденциальности</a> ознакомлен. Даю согласие на обработку персональных данных.
      </label>
    </div>
      -->
    <div class='button-row'>
        <?= Html::submitButton("Отправить", ['class' => 'standard-button', 'form' => 'w0']); ?>
    </div>
  </div>
</section>