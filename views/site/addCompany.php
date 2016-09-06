<?php
/**
 * Created by PhpStorm.
 * User: RekstaR
 * Date: 20.06.16
 * Time: 18:12
 */ ?>
<!-- Контактная информация -->
<section class='reg-info-block'>
    <div class='info-block-data'>
        <div class='data-row'>
            <label>Фамилия</label>
            <input type='text' class='input-long' placeholder="Фамилия"></input>
        </div>
        <div class='data-row'>
            <label>Имя</label>
            <input type='text' class='input-long' placeholder="Имя"></input>
        </div>
        <div class='data-row'>
            <label>Отчество</label>
            <input type='text' class='input-long' placeholder="Отчество"></input>
        </div>
        <div class='data-row'>
            <label>Email</label>
            <input type='email' class='input-long' placeholder="E-mail"></input>
        </div>
        <div class='data-row'>
            <label>Номер телефона</label>
            <input type='phone' value="+7(___)___-__-__" class='input-long'></input>
        </div>

        <div class='data-row'>
            <label>Пароль</label>
            <input type='password' class='input-long'></input>
        </div>
        <div class='data-row'>
            <label>Пароль ещё раз</label>
            <input type='password' class='input-long'></input>
        </div>

    </div>
</section>

<!-- Подтверждение -->
<section class='reg-info-block'>
    <div class='info-block-data'>
        <div class='checkbox-row'>
            <input type='checkbox'>
            <label> С <a href='#'> Условиями использования</a> сервиса и <a href='#'> Политикой конфиденциальности</a> ознакомлен. Даю согласие на обработку персональных данных.
            </label>
        </div>
        <div class='button-row'>
            <button class='standard-button'>Отправить</button>
        </div>
    </div>
</section>