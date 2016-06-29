<?php
$this->title="Профиль пользователя"
?>
<?php
echo '<div style="margin-left:auto;margin-right: auto; margin-bottom:100px; width: 400px;margin-top: 100px;color: red;">Страница временно находится на стадии разработки</div>'
/*
?>
<div class="profile-body-container">
    <div class="profile-block profile-menu">
        <div class="user-info">
            <img class="profile-image" src="<?= Yii::$app->request->baseUrl ?>/images/profile-photo.png">
            <h2 class="user-last-name">
                Акиньшин
                <small>Алексей Игоревич</small>
            </h2>
            <h3 class="user-phone">+7 (919) 234-58-64</h3>
            <a href="mailto:aleksey.sys.ak@gmail.com" class="user-mail">aleksey.sys.ak@gmail.com</a>
        </div>
        <ul class="menu-list">
            <!----><li ng-repeat="item in menu">
                <a ng-class="isActive(item.href)" ng-click="item.action()">
                    <!----><span ng-include="item.marker" class=""><!--?xml version="1.0" encoding="utf-8"?-->
<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
<g>
    <path fill="#7C7C7C" d="M15.417,6.417C15.417,9.96,9,17.932,9,17.932S2.583,9.96,2.583,6.417S5.456,0,9,0
		S15.417,2.873,15.417,6.417z"></path>
</g>
</svg>
</span>
                    Редактировать профиль
                </a>
            </li><!----><li ng-repeat="item in menu">
                <a ng-class="isActive(item.href)" ng-click="item.action()">
                    <!----><span ng-include="item.marker" class=""><!--?xml version="1.0" encoding="utf-8"?-->
<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
<path fill="#7C7C7C" d="M15.009,7.133L14.434,4.57c-0.042-0.792-0.889-1.404-1.961-1.404H5.527c-1.072,0-1.918,0.612-1.961,1.404
	L2.992,7.132c-0.908,0.274-1.576,1.123-1.576,2.14v1.237c0,0.88,0.501,1.634,1.223,2c-0.008,0.051-0.03,0.097-0.03,0.15v0.182
	c0,0.552,0.448,1,1,1s1-0.448,1-1V12.75h9.057v0.091c0,0.552,0.448,1,1,1c0.552,0,1-0.448,1-1v-0.182
	c0-0.102-0.03-0.195-0.058-0.287c0.587-0.402,0.975-1.086,0.975-1.863V9.272C16.583,8.255,15.917,7.407,15.009,7.133z M4.552,4.743
	l0.012-0.109c0-0.186,0.384-0.467,0.962-0.467h6.946c0.579,0,0.963,0.281,0.963,0.467l0.529,2.398H4.04L4.552,4.743z M4.917,10.792
	c-0.667,0-1.208-0.541-1.208-1.208s0.541-1.208,1.208-1.208c0.667,0,1.208,0.541,1.208,1.208S5.584,10.792,4.917,10.792z M13,10.792
	c-0.667,0-1.208-0.541-1.208-1.208S12.333,8.375,13,8.375s1.208,0.541,1.208,1.208S13.667,10.792,13,10.792z"></path>
</svg>
</span>
                    Изменить пароль
                </a>
            </li><!----><li ng-repeat="item in menu">
                <a ng-class="isActive(item.href)" ng-click="item.action()">
                    <!----><span ng-include="item.marker" class=""><!--?xml version="1.0" encoding="utf-8"?-->
<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
<path fill="#7C7C7C" d="M14.082,4.213c0,0.368-0.298,0.666-0.666,0.666l0,0c-0.368,0-0.666-0.298-0.666-0.666V2.749
	c0-0.368,0.298-0.666,0.666-0.666l0,0c0.368,0,0.666,0.298,0.666,0.666V4.213z"></path>
    <path fill="#7C7C7C" d="M5.67,4.213c0,0.368-0.298,0.666-0.666,0.666l0,0c-0.368,0-0.666-0.298-0.666-0.666V2.749
	c0-0.368,0.298-0.666,0.666-0.666l0,0c0.368,0,0.666,0.298,0.666,0.666V4.213z"></path>
    <path fill="#7C7C7C" d="M15.384,3.082h-0.85v1.19c0,0.626-0.507,1.133-1.133,1.133c-0.626,0-1.133-0.507-1.133-1.133v-1.19H6.151
	v1.19c0,0.626-0.507,1.133-1.133,1.133c-0.626,0-1.133-0.507-1.133-1.133v-1.19H2.923c-0.939,0-1.699,0.761-1.699,1.699v9.8
	c0,0.939,0.761,1.699,1.699,1.699h12.462c0.939,0,1.699-0.761,1.699-1.699v-9.8C17.084,3.843,16.323,3.082,15.384,3.082z
	 M15.498,14.524H2.809V7.387h12.688V14.524z"></path>
</svg>
</span>
                    Изменить e-mail
                </a>
            </li><!---->
        </ul>
    </div>
    <div class="profile-block profile-content">
        <div class="breadcrumbs">
            Личный кабинет/<span class="section-name">Редактировать профиль</span>
        </div>
        <!----><div class="section-container" ng-include="getSection()">  <!----><div class="contact-block-mini" ng-repeat="point in points">
                <div class="contact-block-header">
                    LR-Premium
                </div>
                <div class="contact-block-content">
                    <div class="profile-block company-descr">
                        <div class="company-logo">
                            <img ng-src="<?= Yii::$app->request->baseUrl ?>/images/logo.png" src="<?= Yii::$app->request->baseUrl ?>/images/logo.png">
                        </div>
                        <div class="company-text">
                            <!-- <h2>LR-Premium </h3> -->
                            <p>Сертифицированный сервис для вашего Land Rover в Москве. Комплексная диагностика в подарок при первом посещении.</p>
                        </div>
                    </div>
                    <div class="profile-block profile-info">
                        <table>
                            <tbody>
                            <!-- <tr>
                              <td>Дата регистрации/<span class='bold'>15.08.2016</span></td>
                              <td><img ng-src='{{regDateValid ? "images/param-ok.png" : "images/param-fail.png"}}' ng-click='regDateValid = !regDateValid'/></td>
                            </tr> -->
                            <tr>
                                <td>Профиль заполнен на <span class="bold">56%</span></td>
                                <td><div class="prog-bar-container"><div class="prog-bar"></div></div></td>
                            </tr>
                            <tr>
                                <td>Cтатус: <span class="bold">Не опубликован</span></td>
                                <td><div class="switch" ng-class="{success:point.status}" ng-click="point.status = !point.status" role="button" tabindex="0"><div class="switch-pip"></div></div></td>
                            </tr>
                            <!-- <tr>
                              <td>реквизиты/<span class='bold'>подтверждены</span></td>
                              <td><img ng-src='{{requisitesConfirmed ? "images/param-ok.png" : "images/param-fail.png"}}' ng-click='requisitesConfirmed = !requisitesConfirmed'/></td>
                            </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!----><div class="contact-block-mini" ng-repeat="point in points">
                <div class="contact-block-header">
                    Porsche Family
                </div>
                <div class="contact-block-content">
                    <div class="profile-block company-descr">
                        <div class="company-logo">
                            <img ng-src="<?= Yii::$app->request->baseUrl ?>/images/logo.png" src="<?= Yii::$app->request->baseUrl ?>/images/logo.png">
                        </div>
                        <div class="company-text">
                            <!-- <h2>LR-Premium </h3> -->
                            <p>Сертифицированный сервис для вашего Porsche в Москве. Комплексная диагностика в подарок при первом посещении.</p>
                        </div>
                    </div>
                    <div class="profile-block profile-info">
                        <table>
                            <tbody>
                            <!-- <tr>
                              <td>Дата регистрации/<span class='bold'>15.08.2016</span></td>
                              <td><img ng-src='{{regDateValid ? "images/param-ok.png" : "images/param-fail.png"}}' ng-click='regDateValid = !regDateValid'/></td>
                            </tr> -->
                            <tr>
                                <td>Профиль заполнен на <span class="bold">56%</span></td>
                                <td><div class="prog-bar-container"><div class="prog-bar"></div></div></td>
                            </tr>
                            <tr>
                                <td>Cтатус: <span class="bold">Не опубликован</span></td>
                                <td><div class="switch" ng-class="{success:point.status}" ng-click="point.status = !point.status" role="button" tabindex="0"><div class="switch-pip"></div></div></td>
                            </tr>
                            <!-- <tr>
                              <td>реквизиты/<span class='bold'>подтверждены</span></td>
                              <td><img ng-src='{{requisitesConfirmed ? "images/param-ok.png" : "images/param-fail.png"}}' ng-click='requisitesConfirmed = !requisitesConfirmed'/></td>
                            </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!---->
            <div class="block-placeholder add-block" ng-click="addCompany()" role="button" tabindex="0">
                <h1>+</h1>
                <a href="#/reg">Добавить компанию</a>
            </div>
        </div>
    </div>
</div>
 */
?>