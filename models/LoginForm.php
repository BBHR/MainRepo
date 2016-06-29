<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\db\Expression;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;
    private $checkEmail=false;

    public $verifyCode;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            ['username', 'required', 'message' => 'Пожалуйста, введите адрес электронной почты'],
            ['username', 'email', 'message' => 'Невалидный e-mail'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'checkEmail'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            [['password'], 'string', 'min'=>8, 'max'=>255,'tooShort'=>'Минимальное значения должно быть не менее 8 символов'],            // password is validated by validatePassword()
            ['password', 'validatePassword'],

            [['verifyCode'], 'required', 'when' => function($attribute){return $this->captchaNeeded();},
                'message' => 'Введите проверочный код'],
            [['verifyCode'], 'captcha', 'when' => function($attribute){return $this->captchaNeeded();}],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Email',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить',
            'verifyCode' => 'Введите текст, который видите на картинке',
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный пароль или логин.');
                Yii::$app->session->set('_try_login', Yii::$app->session->get('_try_login', 0)+1);

            }else{
                Yii::$app->session->set('_try_login', 0);
                $users=Users::findOne(['user_email'=>$this->username]);
                $visits=new Visits();
                $visits->userId=$users->idUser;
                $visits->userIp=$_SERVER['REMOTE_ADDR'];
                $visits->browser=$_SERVER['HTTP_USER_AGENT'];
                $visits->sessionId=Yii::$app->session->getId();
                $visits->visit_time=new Expression('NOW()');
                $visits->last_action=new Expression('NOW()');
                $visits->status=1;
                $visits->save(false);
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->username);
        }

        return $this->_user;
    }
    public function checkEmail(){
        if ($this->checkEmail === false) {
            $check=$this->checkEmail = User::findByEmail($this->username);;
        }
        if(!$check){
            $this->addError('username', 'Такой Email еще не зарегистрирован!');
        }
    }

    public function captchaNeeded(){
        return Yii::$app->session->get('_try_login', 0) > 4;
    }

}
