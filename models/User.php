<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\widgets\ActiveForm;

class User extends ActiveRecord implements IdentityInterface
{
    public $idUser;
    public $auth_key;
    public $fname;
    public $name;
    public $lname;
    public $email;
    public $hashPassword;
    public $telephone;
    public $active;
    public $uroleId;
    public $datecreate;
    public $lastupdate;

    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_WAIT = 2;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'user_surname', 'user_name', 'user_patronymic', 'user_email', 'user_password', 'user_phone_number', 'user_status', 'user_signup_at', 'user_lastupdate'], 'required'],
            [['user_status'], 'integer'],
            [['user_signup_at', 'user_lastupdate'], 'safe'],
            [['auth_key'], 'string', 'max' => 32],
            [['user_surname', 'user_name', 'user_patronymic'], 'string', 'max' => 100],
            [['user_email', 'user_password'], 'string', 'max' => 255],
            [['user_phone_number'], 'string', 'max' => 20],
            [['user_email'], 'unique'],
        ];
    }

    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findByEmail($email)
    {
        return User::findOne(['user_email' => $email, 'user_status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->idUser;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function setPassword($password)
    {
        $this->user_password = md5(md5($password));
    }

    public function validatePassword($password)
    {
        return $this->user_password === md5(md5($password));
    }

    public function confirmEmailToken($token){
        return Activate::find()->where(['hash_activation'=>$token,'status'=>0])->one();
    }

    public function checkConfirmChangePassword($code){
        return Activate::find()->where(['hash_activation'=>$code,'status'=>self::STATUS_BLOCKED])->orderBy(['idActivation'=>SORT_DESC])->limit(1)->one();
    }
}
