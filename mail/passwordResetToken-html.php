<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'code' => Yii::$app->session['hash']]);
?>
<div class="password-reset">
    <p>Здравствуйте <?= Html::encode(Yii::$app->session['uname']) ?>,</p>

    <p>Перейдите по ссылке для того чтобы восстановить пароль:</p>

    <p><?= Html::a('Восстановления пароля', $resetLink) ?></p>
</div>
