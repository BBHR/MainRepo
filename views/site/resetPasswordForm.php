<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\web\View;

$this->title = 'Сбросить пароль';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div style="margin-left: 300px">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Укажите новый пароль:</p>

        <div class="row">
            <div class="col-lg-5" style="margin-left: auto; margin-right:auto; width: 500px;margin-bottom: 50px;">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php $this->registerJs('siteLogin()',View::POS_READY,'');
?>