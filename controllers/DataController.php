<?php
/**
 * Created by PhpStorm.
 * User: bet
 * Date: 28.07.16
 * Time: 10:57
 */

namespace app\controllers;


use app\models\AutoBrand;
use app\models\AutoWork;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
class DataController extends Controller
{
    public function behaviors()
    {
        $behaviors =  [
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
                'except' => ['index']
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?','@'],
                    ],
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
        $brands = AutoBrand::find()->orderBy(["auto_brand_name"=>"ASC"])->all();
        $works = AutoWork::find()->all();
        return ['statusCode'=>200,"brands"=>$brands,"works"=>$works];
    }
}