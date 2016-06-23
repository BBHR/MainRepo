<?php

?>

<div class="select">

    <div class="select-box">
        <div class="select-box1">
            <form action="#">
                <select class="turnintodropdown select-avto">
                    <option value="">Марка автомобиля</option>
                    <option value="">Acura</option>
                    <option value="">Alfa Romeo</option>
                    <option value="">Aston Martin</option>
                    <option value="">Audi</option>
                    <option value="">BMW</option>
                    <option value="">BYD</option>
                    <option value="">Bentley</option>
                    <option value="">Cadillac</option>
                    <option value="">Changan</option>
                    <option value="">Chery</option>
                    <option value="">Chevrolet</option>
                    <option value="">Chrysler</option>
                    <option value="">Citroen</option>
                </select>
                <span class="select-cursor">&#8250;</span>
            </form>
        </div>
    </div>
    <div class="select-box">
        <div class="select-box1">
            <form action="#">
                <select class="turnintodropdown select-work">
                    <option value="">Вид работ</option>
                    <option value="">Рихтовка</option>
                    <option value="">Балансировка</option>
                    <option value="">Электрика</option>
                    <option value="">Покраска</option>
                </select>
                <span class="select-cursor">&#8250;</span>
            </form>
        </div>
    </div>
    <div class="select-box">
        <input class="select-button" type="button" value="Найти">
        <a href="#">Расширенный поиск</a>
    </div>

</div>

<!--            ////////////////////////////////////////////////////////            -->

<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Y4WI9jh6Fj7dr-r6SxZEm540pI18QlK6&width=100%&height=600&lang=ru_RU&sourceType=constructor"></script>

<!--                  //////////////////////////////////////////////////////                -->
<div class="marker">
    <div class="marker-box1 clearfix">
        <ul class="clearfix">
            <li class="col-md-4 col-sm-6">

                <p>Официальный автосервис</p>
            </li>
            <li class="col-md-4 col-sm-6">

                <p>Неофициальный автосервис</p>
            </li>
            <li class="col-md-4 col-sm-12">

                <p>Несколько точек обслуживания рядом</p>
            </li>
        </ul>
    </div>
</div>
<section class="instruction">
    <div class="instruction-box1">
        <h2>Как это <span>работает</span>!</h2>
        <p>3 простых шага для поиска лучшего автосервиса</p>
    </div>
    <div class="instruction-box2 clearfix">
        <div class="instruction-note col-md-4 col-sm-6">
            <div class="istruction-content">
                <span>1</span>
                <p>Введите марку своего автомобиля и вид работ.</p>
                <div class="img-content img-content1"></div>
            </div>
        </div>
        <div class="instruction-note col-md-4 col-sm-6">
            <div class="istruction-content">
                <span>2</span>
                <p>Выберете из предложенных вариантов ближайший автосервис.</p>
                <div class="img-content img-content2"></div>
            </div>
        </div>
        <div class="instruction-note col-md-4 col-sm-12">
            <div class="istruction-content">
                <span>3</span>
                <p>Запишитесь на ремонт в удобное для вас время.</p>
                <div class="img-content img-content3"></div>
            </div>
        </div>
    </div>
</section>
<section class="servises clearfix">
    <div class="servises-box1">
        <h2>В чём <span>преимущества</span> BiBiHelper!</h2>
        <p>Удобный. Быстрый. Простой</p>
    </div>
    <div class="servises-box2">
        <div class="servises-content">

            <p>Удобный поиск среди сотен компаний в рамках одного сайта</p>
            <p>Обслуживание своего автомобиля во всех компаниях через единый личный кабинет</p>
            <p>Хранение истории ремонта и ранее просмотренных предложений</p>
            <p>Сравнение цен на услуги по ремонту автомобиля</p>
            <p>Онлайн запись в автосервис и получение консультации от экспертов</p>
            <p>Уведомление об акциях и скидках от компаний-партнёров</p>
        </div>
    </div>
</section>
<section class="now-search">
    <h2>Сейчас <span>ищут</span></h2>
    <p>Текущие онлайн запросы в BiBiHelper</p>
    <ul>
        <li><span class="now-search-left">BMW X6</span> <span class="now-search-right">&#8250; Ремонт КПП</span></li>
        <li><span class="now-search-left">Chevrolet Cruze</span> <span class="now-search-right">&#8250; Кузовной ремонт</span></li>
        <li><span class="now-search-left">Mitsubishi Lancer</span> <span class="now-search-right">&#8250; Экспресс замена масла</span></li>
        <li><span class="now-search-left">Renault Clio</span> <span class="now-search-right">&#8250; Замена колодок</span></li>
        <li><span class="now-search-left">Citroen C4</span> <span class="now-search-right">&#8250; Аэрография</span></li>
    </ul>
    <div class="now-search-button">
        <input type="button" class="now-search-button1" value="Найти автосервис">
        <span>или</span>
        <input type="button" class="now-search-button2" value="Расширенный поиск">
    </div>
</section>

<!--
<div class='modal-overlay' ng-show='showAuthorize' ng-click='hideAuth()'>
    <div class='modal-window authorization-window' ng-click='prevent($event)'>
        <header class='modal-window-header'>
            <div class='control-container'>
                <a class="control-close" ng-click='hideAuth()'> X </a>
            </div>
            <h1> Вход в личный кабинет </h1>
        </header>
        <div class='modal-window-content'>
            <ul>
                <li>
                    <input type='email' placeholder="e-mail или логин"/>
                </li>
                <li>
                    <input type='password' placeholder="пароль" />
                </li>
                <li>
                    <a href='#'> Забыли пароль? </a>
                    <md-checkbox>
                        запомнить
                    </md-checkbox>
                </li>
            </ul>
            <button class='standard-button' ng-click='hideAuth()'> Сохранить </button> <a href='#'>Регистрация</a>
        </div>
    </div>
</div>
-->
