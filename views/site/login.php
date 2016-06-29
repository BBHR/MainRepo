<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = Yii::$app->name.' - Вход';
Pjax::begin(['enablePushState' => false]);

?>
<div class="site-login" style="margin-left: auto; margin-right:auto; width: 500px;margin-bottom: 50px; margin-top:20px;">

    <p>Вход в личный кабинет</p>

    <?php $form = ActiveForm::begin([
        'enableClientValidation'=>'true',
        'options' => ['data-pjax' => 1,],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3 _md-container md-ink-ripple\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'class'=>'_md-icon',
        ]) ?>

    <?php
    if(Yii::$app->session->get('_try_login', 0)>4){
    echo $form->field($model, 'verifyCode')->widget(Captcha::className(),[
        //'template' => '{image}{input}',
        'template' => '<div class="row"><div class="col-lg-3">{image}</div>{input}',
        'imageOptions' => ['title' => 'Обновить', 'style' => 'cursor: pointer;'],
    ]);
    }
    ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-danger standard-button', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        Забыли паролья <a href="<?= Url::toRoute('site/passreset') ?>">Восстановить<a>
    </div>
</div>
