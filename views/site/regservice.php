<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerJs("$('#checkAgree').click(function(){"
        . " if ($(this).prop('checked')){"
        . "  $('#submit').attr('disabled', false)}"
        . "else{ $('#submit').attr('disabled', true) }})");

$this->registerJs("$('#submit').click(function(){"
        . "$('#w0').submit()})");

?>


<!-- Контактная информация -->
<section class='reg-info-block'>
  <div class='info-block-data'>
      <?php $form = ActiveForm::begin(); ?>
      
      <?= $form->field($model, 'user_surname', [
          'template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],
          'options' => ['class' => 'data-row'], 
          'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Фамилия']
          ])->textInput()?>
      
      
      <?= $form->field($model, 'user_name', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Имя']])->textInput()?>
      
      <?= $form->field($model, 'user_patronymic', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'Отчество']])->textInput()?>
      
      <?= $form->field($model, 'user_email', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => 'E-mail']])->textInput()?>
      
      <?= $form->field($model, 'user_phone_number', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long', 'placeholder' => '+7(___)___-__-__']])->textInput()?>
      
      <?= $form->field($model, 'user_password', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long']])->passwordInput()?>
      
      <?= $form->field($model, 'user_password_repeat', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],
          'options' => ['class' => 'data-row'], 'inputOptions' => ['class' => 'input-long']])->passwordInput()?>
      
      <?= $form->field($model, 'captcha', ['template' => "{label}\n{input}\n{hint}\n<label></label>{error}", 
          'errorOptions' => ['class' => 'help-block', 'style' => 'margin-left:50px; display: inline-block; height:20px'],
          'options' => ['class' => 'data-row']])->widget(
              \yii\captcha\Captcha::className(), 
              [
                  'options' => ['class' => 'input-long', 'style' => 'width: 23%;'],
                  'imageOptions' => ['style' => 'margin-left: 30px;']
              ]    
              )?>
      
      <?= Html::input("hidden", "type", "sto")?>
      
      <?php ActiveForm::end(); ?>

  </div>
</section>

<!-- Подтверждение -->
<section class='reg-info-block'>
  <div class='info-block-data'>
    <div class='checkbox-row'>
      <input type='checkbox' id="checkAgree">
      <label> С <a href='#'> Условиями использования</a> сервиса и <a href='#'> Политикой конфиденциальности</a> ознакомлен. Даю согласие на обработку персональных данных.
      </label>
    </div>
    <div class='button-row'>
        <?= Html::submitButton("Отправить", ['class' => 'standard-button', 'disabled' => true, 'id' => 'submit']); ?>
    </div>
  </div>
</section>