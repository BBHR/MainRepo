<?php
$h = "Регистрация";
$text = "нового пользователя";
$p = "Укажите контактные данные. Информация будет доступна только администрации портала BiBiHelper.ru";
if ($this->context->module->requestedAction->id == "regservice") {
    $text =  "регистрацию СТО";
    $h = "Заявка на";
    //$p = "Укажите информацию о СТО - контактные данные. Сведения будут видны посетителям портала BiBiHelper.ru при поиске сервиса";
}
?>
<div class="slogan-box">
    <h1><?= $h ?> <span><?= $text ?></span></h1>
</div>
<div class="slogan-box">
    <p><?= $p ?></p>
</div>