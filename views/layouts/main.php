<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = "BibiHelper";
?>
<?php $this->beginPage(); ?>
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
                        <a href="<?= Url::home() ?>"><?= Html::img('/images/logo.jpg', ['alt' => 'lotogip']) ?></a>
                    </div>
                    <div class="col-md-8 col-sm-12 logo-2">
                        <div class="col-md-4 col-sm-4 col-xs-12 info-box1">
                            <div class="add-company">
                                <a href="<?= Url::toRoute('site/regservice') ?>">Добавить компанию</a>
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
                                <span class="select-cursor">&#8250;</span>
                            </div>
                        </div>
                        <div class='col-md-4 col-sm-4 col-xs-12 info-container'>
                            <div class='profile-menu-top'>
                                <div class="col-md-9 col-sm-9 col-xs-9 info-box1">
                                    <div class="personal-account">
                                        <a href="#/profile">Личный кабинет</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 info-box1">
                                    <div class='personal-image'>
                                        <a href='#/me'>
                                            <img ng-src=''/>
                                        </a>
                                    </div>
                                </div>
                                <div class='hidden-menu'>
                                    <ul class='profile-menu-nav'> Профиль
                                        <li ng-repeat = 'service in points'>
                                            <a href='#'> </a>
                                        </li>
                                    </ul>
                                    <a href='#'>Предложение разработчикам</a>
                                    <div class='hidden-menu-footer'>
                                        <?php if(Yii::$app->user->isGuest) : ?>
                                        <a href='<?= Url::toRoute('site/login'); ?>'>Вход</a>
                                        <?php else : ?>
                                        <a href='<?= Url::toRoute('site/logout'); ?>' data-method="post">Выход</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php if (Yii::$app->session->hasFlash("reg_done")) : ?>
                <div class="main text-center">
                    <div class="row">
                        <div class="col-md-12 bg-info" style="padding:5px;">
                        <h2><?= Yii::$app->session->getFlash("reg_done"); ?></h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <section class="header slogan">
                <?php if (substr($this->context->module->requestedAction->id, 0, 3) != 'reg') : ?>
                    <?= $this->render('_main_header');?>
                <?php else : ?>
                    <?= $this->render('_register_header', ['id' => $this->context->module->requestedAction->id])?>
                <?php endif; ?>
                </section>
            </header>
            
            <main class="main">
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
                            <!--
                            <h6>Автовладельцам</h6>
                            <ul>
                                <li><a href="">Поиск</a></li>
                                <li><a href="">Расширенный поиск</a></li>
                                <li><a href="">Автотехцентры</a></li>

                            </ul>
                            -->
                            <h6>Компаниям</h6>
                            <ul>
                                <li><a href="">Добавить компанию</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                            <h6 class="">Личный кабинет</h6><!-- self-room -->
                            <ul>
                                <?php if (Yii::$app->user->isGuest) : ?>
                                    <li><a href='<?= Url::toRoute('site/login'); ?>'>Вход</a></li>
                                    <li><?php //= Html::a("Регистрация", Url::toRoute("/site/registration"))?></li>
                                <?php else : ?>
                                    <li><a href='<?= Url::toRoute('site/logout'); ?>' data-method="post">Выход</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-box2 col-md-4">
                        <h6>Мы в социальных сетях</h6>
                        <ul>
                            <li><a href="https://vk.com/" target="_blank"><?= Html::img('/images/vkontakte.jpg', ['alt' => 'Вконтакте']) ?></a></li>
                            <?php /*
                            <li><a href="https://www.facebook.com/" target="_blank"><?= Html::img('/images/fasebook.jpg', ['alt' => 'Фэйсбук']) ?></a></li>
                            <li><a href="https://twitter.com/" target="_blank"><?= Html::img('/images/twitter.jpg', ['alt' => 'Твиттер']) ?></a></li>
                             */ ?>
                        </ul>
                        <a href="#modal" class="qwestion" data-toggle="modal">
                            <?= Html::img('/images/qwestion.jpg', ['alt' => 'Вопрос']) ?>
                            <h6>Остались  вопросы?</h6>
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
            <?php 
                    Modal::begin([
                        'id' => 'modal',
                        'header' => "<div class='text-center'>Здравствуйте, уважаемый гость!</div>"
                    ]); 
                    echo "Мы работаем над реализацией этой функции. Совсем скоро она будет доступна!";
                    Modal::end();
                
                ?>
</html>
<?php $this->endPage() ?>
