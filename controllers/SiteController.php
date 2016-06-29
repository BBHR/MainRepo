<?php

namespace app\controllers;

use app\models\ConfirmEmail;
use app\models\Registration;
use app\models\ResetPassword;
use app\models\ResetPasswordForm;
use app\models\Users;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /*public function behaviors()
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
*/
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
        $user=Users::find()->where(['idUser'=>13])->one();
        return $this->render('index',['model'=>$user]);
    }

    public function actionLogin()
    {
        $this->layout='login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['user/profile']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration()
    {
        $this->layout="registr";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model=new Users();

        return $this->render('registration',['model'=>$model]);
    }


    public function actionAddcompany(){
        $this->layout="registr";
        $model=new Registration();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                Yii::$app->session->setFlash('success', 'На указанный адрес электронной почты отправлено письмо. Для завершения регистрации перейдите по ссылке в письме. </br>Если письмо не пришло то проверьте папку Спам.');
                return $this->refresh();
        }
        return $this->render('addcompany',['model'=>$model]);
    }

    public function actionPassreset(){

        $this->layout="login";
        $model=new ResetPassword();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'На вашу почту отправлена инструкция по восстановлению пароля.');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
     return  $this->render('resetPassword',['model'=>$model]);

    }

    public function actionResetPassword($code)
    {
        try {
            $model = new ResetPasswordForm($code);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль успешно изменен.');

            return $this->refresh();
        }

        return $this->render('resetPasswordForm', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($code){
        try {
            $model = new ConfirmEmail($code);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->confirmEmail()) {
            //Yii::$app->getSession()->setFlash('success', 'Вы успешно зарегистрировались в системе.');

            return $this->redirect(['user/profile']);
        }


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
        return $this->render('change', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('pages/confirm');
    }
}
