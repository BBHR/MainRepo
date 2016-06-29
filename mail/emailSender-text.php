<?php
use yii\helpers\Html;
use yii\web\Session;


$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'code' =>Yii::$app->session['hash']]);
?>

Здравствуйте, Администратор СТО – <?=  Yii::$app->session['surname'] ?>! 
    Ваша заявка на регистрацию на портале Biihelper подтверждена. 
    Для завершения регистрации перейдите по ссылке <?= $confirmLink ?>
С уважением, команда Bibihelper, <?= Yii::$app->params['adminEmail'] ?>.
