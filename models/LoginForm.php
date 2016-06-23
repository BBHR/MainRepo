<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
            [['password'], 'string', 'min'=>8, 'max'=>255,],            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
                $this->addError($attribute, 'Incorrect username or password.');
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
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
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
            $this->_user = Users::find()->where(['email'=>$this->username])->one();
        }

        return $this->_user;
    }
    public function checkEmail(){
        if ($this->checkEmail === false) {
            $check=$this->checkEmail = Users::find()->where(['email'=>$this->username,'active'=>Users::STATUS_ACTIVE])->one();
        }
        if(!$check){
            $this->addError('username', 'Такой Email еще не зарегистрирован!');
        }
    }

}
