<?php
use yii\helpers\Html;
 use yii\web\Session;

 
$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'code' =>Yii::$app->session['hash']]);
?>

<i>Здравствуйте, Администратор СТО – <?=  Yii::$app->session['surname'] ?>! <br> <br>
Ваша заявка на регистрацию на портале Biihelper подтверждена. <br> <br>
Для завершения регистрации перейдите по ссылке <a href="<?=$confirmLink ?>">Активация</a> </i>.
<br>
<br>
С уважением, команда Bibihelper, <a href="mailto:<?= Yii::$app->params['adminEmail'] ?>"><?= Yii::$app->params['adminEmail'] ?></a>.
