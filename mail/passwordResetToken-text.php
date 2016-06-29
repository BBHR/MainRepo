<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'code' => $activate->hash_activation]);
?>
Здравствуйте <?= $user->user_name ?>,

Перейдите по ссылку для того чтобы восстановить пароль:

<?= $resetLink ?>
