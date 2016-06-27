<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title="BibiHelper";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-2.1.4.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body ng-controller='RootCtrl'>
<?php $this->beginBody() ?>
<div class="container-fluid">
    <header class="header container">
        <div class="logotype clearfix">
            <div class="col-md-4 col-sm-12 logo">
                <a href="<?=Url::home()?>"><?=Html::img('../images/logo.jpg', ['alt'=>'lotogip'])?></a>
            </div>
            <div class="col-md-8 col-sm-12 logo-2">
                <div class="col-md-4 col-sm-4 col-xs-12 info-box1">
                    <div class="add-company">
                        <a href="<?= Url::toRoute('site/addcompany') ?>">Добавить компанию</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 info-box1">
                    <div class="info-select-box">
                        <form action="#">
                            <select class="turnintodropdown select-info-box">
                                <option>Выберите город </option>
                                <option>Новосибирск</option>
                                <option>Красноярск</option>
                                <option>Самара</option>
                                <option>Волгоград</option>
                            </select>
                        </form>
                        <!--
                                                    <select name="" id="" class="select-info-box">
                                                        <option value="">Выберите город</option>
                                                        <option value="">Новосибирск</option>
                                                        <option value="">Красноярск</option>
                                                        <option value="">Самара</option>
                                                        <option value="">Волгоград</option>
                                                    </select>
                        -->
                        <span class="select-cursor">&#8250;</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 info-box1">
                    <div class="personal-account">
                        <a href="<?= Url::toRoute('site/login'); ?>">Личный кабинет</a>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12 info-box1 pull-right">
                    <div class='personal-image'>
                        <a href='#/me'>
                            <img ng-src='{{user.avatar}}'/>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <section class="header slogan">
            <div class="slogan-box">
                <h1>Заявка на <span>регистрацию СТО</span></h1>
            </div>
            <div class="slogan-box">
                <p>Укажите информацию о СТО - контактные данные. Сведения будут видны посетителям портала BiBiHelper.ru при поиске сервиса</p>
            </div>
        </section>
    </header>

    <main class="main">
        <?= $content ?>
    </main>
    <!--                                Footer - Подвал                            -->

    <?=
    Yii::$app->controller->renderPartial('//layouts/_footer');
    ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
