<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<section class='reg-info-block clearfix'>
<div class='col-xs-12 col-sm-12'>

  <div class='grey-block col-sm-4 col-xs-4'>
    <img src='<?=Yii::$app->request->baseUrl ?>/images/regtype-user.png'/>
    <h3> Автовладелец</h3>
    <p>Кто ценит своё время и не хочет его тратить на сравнение цен, поиск отзывов о качестве работы в конкретном автотехцентре.</p>
    <?= Html::a("Регистрация", Url::toRoute('/site/reguser'), ['class' => 'standard-button'])?>
  </div>

  <div class='white-block col-sm-4 col-xs-4'>
    <span class='centered-span'> или </span>
  </div>

  <div class='grey-block col-sm-4 col-xs-4'>
    <img src='<?=Yii::$app->request->baseUrl ?>/images/regtype-sto.png'/>
    <h3>Автосервис</h3>
    <p>Юридические лица: автотехцентры (в т.ч. официальные). шиномонтажи, автомойки, тюнинг-ателье, АЗС и пр.</p>
    <?= Html::a("Регистрация", Url::toRoute('/site/regservice'), ['class' => 'standard-button'])?>
  </div>
</div>
</section>