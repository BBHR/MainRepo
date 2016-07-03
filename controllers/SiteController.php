<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Mail;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        
        if ($key) {
            $model = Users::findOne(['auth_key' => $key]);
        }
        
        if ($model) {
            $model->user_status = Users::STATUS_ACTIVE;
            $model->auth_key = "";
            if (Yii::$app->user->login($model)) {
                return $this->goBack();
            }
            else {
                throw new \yii\authclient\InvalidResponseException("Не удалось авторизоваться", "Попробуйте еще раз");
            }
        }
        else {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
    }

    public function actionRegistration()
    {
        //$this->layout="registr";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model=new Users();

        return $this->render('registration',['model'=>$model]);
    }

    public function actionReguser() {
        $model = new Users();
        return $this->render('reguser', ['model' => $model]);
    }
    
    public function actionRegservice() {
        $model = new Users();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post()['Users'];
            $model->user_signup_at = date("Y-m-d H:i:s", time());
            $model->user_signin_at = date("Y-m-d H:i:s", time());
            $model->user_status = Users::STATUS_BLOCKED;
            $model->user_name = $post['user_name'];
            $model->user_password = $post['user_password'];
            $model->user_phone_number = $post['user_phone_number'];
            $model->user_surname = $post['user_surname'];
            $model->user_patronymic = $post['user_patronymic'];
            $model->auth_key = $model->getAuthKey();
            if ($model->save()) {
                $url = Yii::$app->urlManager->createAbsoluteUrl("/site/login?key={$model->auth_key}");
                $mail = new Mail();
                $mail->setMessage("Здравствуйте, <Администратор СТО – {$model->user_surname}>!<br>
Ваша заявка на регистрацию на портале Bibihelper подтверждена.<br>
Для завершения регистрации перейдите по ссылке {$url}.<br>
С уважением, команда Bibihelper, support@bibihelper.com.
")->setSubject("Регистрация на портале Biihelper");
                $mail->setTo($model->user_email);
                $mail->setFrom("support@bibihelper.com");
                $mail->send();
                Yii::$app->session->setFlash("reg_done", "На вашу электронную почту отправлено письмо для завершения регистрации!");
                return $this->goHome();
            }
        }
        return $this->render('regservice', ['model' => $model]); 
    }

    public function actionAddcompany(){
        $this->layout="registr";
        $model=new Users();

        return $this->render('addcompany',['model'=>$model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
