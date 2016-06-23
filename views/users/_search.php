<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'hashPassword') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'uroleId') ?>

    <?php // echo $form->field($model, 'datecreate') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>