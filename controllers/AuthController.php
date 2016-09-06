<?php
/**
 * Created by PhpStorm.
 * User: bet
 * Date: 28.07.16
 * Time: 10:57
 */

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use app\models\Mail;
class AuthController extends Controller
{
    public function behaviors()
    {
        $behaviors =  [

//            'corsFilter' => [
//                'class' => \yii\filters\Cors::className(),
//                'cors' => [
//                    'Origin' => ['*'],
//                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'],
//                    'Access-Control-Request-Headers' => ['*'],
//                ],
//
//            ],
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['Origin', 'X-Requested-With', 'Content-Type', 'Accept', 'Authorization'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Expose-Headers' => [],
                ],
            ],
            'authenticator' => [
                'class' => HttpBearerAuth::className(),
                'only' => ['index']
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','restore'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login','sign-up','confirm'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ]
                ],

            ],
        ];
        //фильтруем первичный OPTIONS запрос
        if(\Yii::$app->getRequest()->getMethod() == 'OPTIONS') {
            unset($behaviors['authenticator']);
        }
        return $behaviors;
    }


    public function beforeAction($action) {
        session_start();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->controller->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        return ['statusCode'=>200,'data'=> \Yii::$app->user->identity];
    }

    public function actionLogin()
    {
        $request = \Yii::$app->request;
        $login = new LoginForm();
        $login->attributes = $request->post('login');
        $loginAttempt = $login->login();
        if ($loginAttempt) {
            return ['status'=>'OK','statusCode'=>200,'message'=>\Yii::t('app','Добро пожаловать в систему'),'data'=> \Yii::$app->user->identity->getAuthKey()];
        }
        if ($login->getUser() && $login->getUser()->user_status === 0) {
            return ['status'=>'error','statusCode'=>400,'message'=>\Yii::t('app','Регистрация не завершена'), 'data' => ['username'=>['Регистрация не завершена. Завершите регистрацию, перейдя по ссылке в письме, которое мы отправили на адрес '.$login->getUser()->user_email]]];
        }
        return ['status'=>'error','statusCode'=>400,'message'=>\Yii::t('app','Неверно введены логин или пароль'), 'data' => $login->getErrors()];
    }
    public function actionRestore()
    {
        $request = \Yii::$app->request;
        $key = $request->post('email');
        if ($key) {
            $user = User::findOne(['user_email'=>$key]);
            if ($user) {
                $password = $user->user_password = \Yii::$app->security->generateRandomString(10);
                $user->save();
                $mail = new Mail();
                $mail->setMessage("Здравствуйте, {$user->user_surname} {$user->user_name}!<br>
            Ваш пароль был изменен. Ваш новый пароль : {$password}<br>
            С уважением, команда Bibihelper, support@bibihelper.com.
            ")->setSubject("Восстановление пароля на портале Biihelper");
                $mail->setTo($user->user_email);
                $mail->setFrom("BibiHelper Support<support@bibihelper.com>");
                $mail->send();
                return ['status'=>'OK','statusCode'=>200,'message'=>\Yii::t('app','На указанный адрес электронной почты было отправлено письмо с новым паролем')];
            }
        }
        return ['status'=>'error','statusCode'=>400,'message'=>\Yii::t('app','Пользователь не зарегистрирован или уже авторизован')];
    }
    public function actionConfirm()
    {
        $request = \Yii::$app->request;
        $key = $request->post('key');
        if ($key) {
            $user = User::findOne(['auth_key'=>$key,'user_status'=>0]);
            if ($user) {
                $user->user_status = 1;
                $userRole = \Yii::$app->authManager->getRole('sto-admin');
                \Yii::$app->authManager->assign($userRole, $user->user_id);
                $user->save();
                return ['status'=>'OK','statusCode'=>200,'message'=>\Yii::t('app','Добро пожаловать в систему'),'data'=> $user->getAuthKey()];
            }
        }
        return ['status'=>'error','statusCode'=>400,'message'=>\Yii::t('app','Пользователь не зарегистрирован или уже авторизован')];
    }
    public function actionSignUp()
    {
        $request = \Yii::$app->request;
        $signup = new User();
        $signup->setAttributes($request->post('user'));
        $signup->user_signup_at = date('Y-m-d H:i:s',time());
        $signup->user_signin_at = date('Y-m-d H:i:s',time());
        if ($signup->validate() && $request->post('user')['rules_confirm']) {
            $signup->createAuthKey();
            $signup->save();
            $usertype = $request->post('user')['type'];
            if (!$usertype) $usertype = 'user';
            //TODO: назначение роли

            $mail = new Mail();
            $mail->setMessage("Здравствуйте, {$signup->user_surname} {$signup->user_name}!<br>
            Для подтверждения регистрации пройдите по <a href='http://bibihelpertest.ru.swtest.ru/#/regconfirm/{$signup->getAuthKey()}'>этой ссылке</a>.<br>
            С уважением, команда Bibihelper, support@bibihelper.com.
            ")->setSubject("Регистрация на портале Bibihelper");
            $mail->setTo($signup->user_email);
            $mail->setFrom("BibiHelper Support<support@bibihelper.com>");
            $mail->send();

//            \Yii::$app->user->login($signup,3600*24);
            return ['status' => 'OK','statusCode' => '200' , 'message' => \Yii::t('app','Регистрация успешна. Мы выслали вам письмо со ссылкой для завершения регистрации.'), 'data' => $signup ,'test' => $signup->user_id];
        }
        return ['status'=>'error','statusCode' =>'400','message' => \Yii::t('app','Регистрационные данные не верны'), 'errors' => $signup->getErrors()];
    }
    public function actionLogout()
    {

    }
}