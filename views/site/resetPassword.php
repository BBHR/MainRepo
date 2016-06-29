<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


$this->title = Yii::$app->name.'- Восстановить пароль';
?>

<div class="site-request-password-reset" style="margin-left: auto; margin-right:auto; width: 600px;margin-bottom: 50px;margin-top:50px">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class='info-block-data'>
                <div class="alert alert-success">
                    <?= Yii::$app->session->getFlash('success'); ?>
                </div>
            </div>
    <?php else: ?>
    Восстановления пароля:<br><br><br>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'enableClientValidation'=>'true', 'options' => ['data-pjax' => 1]]); ?>

            <?= $form->field($model, 'email') ?>

            <div class="form-group">
                <?= Html::submitButton('Восстановить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
<?php endif; ?>