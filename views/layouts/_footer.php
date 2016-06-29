<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer>
    <section class="footer clearfix">
        <div class="col-md-8 footer-box1 clearfix">
            <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                <h6>О проекте</h6>
                <ul>
                    <li><a href="<?= Url::toRoute('site/about') ?>">Как это работает</a></li>
                    <li><a href="<?= Url::toRoute('site/news') ?>">Новости</a></li>
                    <li><a href="<?= Url::toRoute('site/vacansy') ?>">Вакансии</a></li>

                </ul>
            </div>
        <div class="col-md-4 col-sm-4 col-xs-6 footer-content">
                <h6>Компаниям</h6>
                <ul>
                    <li><a href="<?= Url::toRoute('site/addcompany') ?>">Добавить компанию</a></li>
                </ul>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 footer-content">

                <h6>Личный кабинет</h6>
                <ul>
                    <!--  <li><a href='<?= Url::toRoute('site/login'); ?>'>Вход</a></li>-->
                    <li><a href='#' ng-click="openAuth()">Вход</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-box2 col-md-4">
            <h6>Мы в социальных сетях</h6>
            <ul>
                <li><a href="https://vk.com/bibihelper" target="_blank"><img src="<?= Yii::$app->request->baseUrl ?>/images/vkontakte.jpg" alt="Вконтакте"></a></li>
                <li><a href="https://www.facebook.com/" target="_blank"><img src="<?= Yii::$app->request->baseUrl ?>/images/fasebook.jpg" alt="Фэйсбук"></a></li>
                <li><a href="https://twitter.com/" target="_blank"><img src="<?= Yii::$app->request->baseUrl ?>/images/twitter.jpg" alt="Твиттер"></a></li>
            </ul>
            <a href="" class="qwestion">
                <img src="<?= Yii::$app->request->baseUrl; ?>/images/qwestion.jpg" alt='Вопрос'>
                <h6>    Остались  вопросы?</h6>
            </a>
        </div>
    </section>
    <div class="copyright">
        <p>&copy; 2015-<?= date('Y') ?> BiBiHelper - информационная автомобильная система</p>
    </div>
</footer>