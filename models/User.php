<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property integer $user_id
 * @property string $user_surname
 * @property string $user_name
 * @property string $user_patronymic
 * @property string $user_email
 * @property string $user_password
 * @property integer $user_phone_number
 * @property integer $user_status
 * @property string $user_signup_at
 * @property string $user_signin_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    
    private $passwordHash;
    
    public $user_password_repeat = null;
    
    public $captcha;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ИД',
            'user_surname' => 'Фамилия',
            'user_name' => 'Имя',
            'user_patronymic' => 'Отчество',
            'user_email' => 'Электронная почта',
            'user_password' => 'Пароль',
            'user_phone_number' => 'Номер телефона',
            'user_status' => 'Статус',
            'user_signup_at' => 'Дата регистрации',
            'user_signin_at' => 'Дата последней авторизации',
            'user_password_repeat' => 'Повторите пароль'
        ];
    }

    public function beforeSave($insert) {
        if ($this->user_password != $this->passwordHash) {
            $this->user_password = \Yii::$app->security->generatePasswordHash($this->user_password);
        }
        return parent::beforeSave($insert);
    }
 
    public function afterFind() {
        $this->passwordHash = $this->user_password;
        return parent::afterFind();
    }
    
    public function getAuthKey() {
        return Yii::$app->security->generateRandomString(32);
    }

    public function getId() {
        return $this->user_id;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key == $authKey;
    }

    public static function findIdentity($id) {
        return Users::findOne(['user_id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return null;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->user_password);
    }
}
