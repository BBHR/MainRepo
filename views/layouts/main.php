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
                        <a href="">Добавить компанию</a>
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
                        <a href="#/profile">Личный кабинет</a>
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
                <h1>Ищите автосервис? Мы <span>поможем</span>!</h1>
            </div>
            <div class="slogan-box">
                <p>Bibihelper - информационная система для решения всего спектра задач, связанных со срочным и плановым обслуживанием автомобиля</p>
            </div>
        </section>
    </header>

    <main class="main" ng-view>
        <?= $content ?>
    </main>
    <!--                                Footer - Подвал                            -->

    <footer>
        <section class="footer clearfix">
            <div class="col-md-8 footer-box1 clearfix">
                <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                    <h6>О проекте</h6>
                    <ul>
                        <li><a href="">Как это работает</a></li>
                        <li><a href="">Новости</a></li>
                        <li><a href="">Вакансии</a></li>

                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                    <h6>Автовладельцам</h6>
                    <ul>
                        <li><a href="">Поиск</a></li>
                        <li><a href="">Расширенный поиск</a></li>
                        <li><a href="">Автотехцентры</a></li>

                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                    <h6>Компаниям</h6>
                    <ul>
                        <li><a href="">Добавить компанию</a></li>
                    </ul>
                    <h6 class="self-room">Личный кабинет</h6>
                    <ul>
                        <li><a href='<?= Url::toRoute('site/login'); ?>'>Вход</a></li>
                        <li><a href="<?= Url::toRoute('site/registration') ?>">Регистрация</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box2 col-md-4">
                <h6>Мы в социальных сетях</h6>
                <ul>
                    <li><a href="https://vk.com/" target="_blank"><?=Html::img('../images/vkontakte.jpg', ['alt'=>'Вконтакте'])?></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><?=Html::img('../images/fasebook.jpg', ['alt'=>'Фэйсбук'])?></a></li>
                    <li><a href="https://twitter.com/" target="_blank"><?=Html::img('../images/twitter.jpg', ['alt'=>'Твиттер'])?></a></li>
                </ul>
                <a href="" class="qwestion">
                    <?=Html::img('../images/qwestion.jpg', ['alt'=>'Вопрос'])?>
                    <h6>    Остались  вопросы?</h6>
                </a>
            </div>
        </section>
        <div class="copyright">
            <p>&copy; 2015-<?= date('Y') ?> BiBiHelper - информационная автомобильная система</p>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
