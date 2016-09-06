<?php
/**
 * Created by PhpStorm.
 * User: bet
 * Date: 28.07.16
 * Time: 11:50
 */

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $user_name;
    public $user_surname;
    public $middle_name;
    public $phone;
    public $user_email;
    public $password;
    public $password_repeat;
    public $rules_confirm;
    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['user_surname', 'user_name', 'user_email', 'user_password', 'user_signup_at'], 'required'],
            ['user_password', 'string', 'min' => 8, 'max' => 256],
            [['user_password_repeat'], 'compare', 'compareAttribute' => 'user_password', 'message' => Yii::t('app', 'Пароли не совпадают'), 'on' => 'regservice, reguser'],
            [['user_phone_number', 'user_status'], 'integer'],
            [['user_phone_number'], 'match', 'pattern' => '#^\d{10}$#'],
            [['user_signup_at', 'user_signin_at'], 'safe'],
            [['user_surname', 'user_name', 'user_patronymic'], 'string', 'max' => 100],
            [['user_surname', 'user_name', 'user_patronymic'], 'match', 'pattern' => "#[А-я\-\`]#"],
            [['user_email'], 'email'],
            [['captcha', 'user_phone_number'], 'required'],
            ['captcha', 'captcha', 'on' => 'regservice, reguser']
        ];
    }
}