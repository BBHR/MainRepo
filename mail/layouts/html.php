<?php
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */
 
$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/email-confirm', 'activate' => $user]);
?>
 
Здравствуйте!<br>
 
Для подтверждения адреса пройдите по ссылке:<br>
 
<?= Html::a(Html::encode($confirmLink), $confirmLink) ?><br>
 
Если Вы не регистрировались на нашем сайте, то просто удалите это письмо.<br>