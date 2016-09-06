<?php
/**
 * Created by PhpStorm.
 * User: Bet
 * Date: 11.07.2016
 * Time: 17:06
 */

namespace app\controllers;


use app\models\User;
use app\models\Users;
use yii\db\ActiveRecord;
use yii\web\Application;
use yii\web\Session;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;
    public $session;
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
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config = []);
        $this->session = new Session();
        $this->session->open();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
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

    public function actionAuth() {
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $user_list = new Users();
            $login = isset($post["login"]) && $post["login"] !== "" ? $post["login"] : false ;
            $password = isset($post["password"]) && $post["password"] !== "" ? $post["password"] : false ;
            $this->session->set("userid",108);
            if ($login && $password) {
            }
            $result = $user_list->find()->where(["id"=>$this->session->get("userid")])->all();
            return $result;
        }
        elseif ($request->isGet) {
            $user_list = new Users();
            $userid = $this->session->get("userid");
            $result = $user_list->find()->where(["id"=>$userid])->all();

            $output = [
                "authed" => sizeof($result) > 0 ? true : false,
                "user" => $result
            ];

            return $output;
        }
        elseif ($request->isDelete) {
            $user_list = new Users();
            $userid = $this->session->remove("userid");
            $result = $user_list->find()->where(["id"=>$userid])->all();
            return $result;
        }
    }
    public function actionIndex() {
        return "hello there";
    }
}