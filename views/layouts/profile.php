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
                <a href="<?=Url::home()?>"><img src="<?= Yii::$app->request->baseUrl ?>/images/logo.jpg" alt="logotip"></a>
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
                <div class="col-md-4 col-sm-4 col-xs-12 info-container">
                    <div class="profile-menu-top">
                        <div class="col-md-9 col-sm-9 col-xs-9 info-box1">
                            <div class="personal-account">
                                <a href="#/profile">Личный кабинет</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 info-box1">
                            <div class="personal-image">
                                <a href="#/me">
                                    <img ng-src="<?= Yii::$app->request->baseUrl ?>/images/profile-photo.png" src="<?= Yii::$app->request->baseUrl ?>/images/profile-photo.png">
                                </a>
                            </div>
                        </div>
                        <div class="hidden-menu">
                            <ul class="profile-menu-nav"> Профиль
                                <!----><li ng-repeat="service in points">
                                    <a href="#"> LR-Premium </a>
                                </li><!----><li ng-repeat="service in points">
                                    <a href="#"> Porsche Family </a>
                                </li><!---->
                            </ul>
                            <a href="#">Предложение разработчикам</a>
                            <div class="hidden-menu-footer">
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl('site/logout') ?>">Выход</a>
                            </div>
                        </div>
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
    </header>
        <main class="main" ng-view>
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
