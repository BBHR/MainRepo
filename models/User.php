<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

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
            [['auth_key', 'fname', 'name', 'lname', 'email', 'hashPassword', 'telephone', 'active', 'uroleId', 'datecreate', 'lastupdate'], 'required'],
            [['active', 'uroleId'], 'integer'],
            [['datecreate', 'lastupdate'], 'safe'],
            [['auth_key'], 'string', 'max' => 32],
            [['fname', 'name', 'lname'], 'string', 'max' => 100],
            [['email', 'hashPassword'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 20],
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

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function setPassword($password)
    {
        //$this->password_hash = Yii::$app->security->generatePasswordHash($password);
        $this->user_password = Yii::$app->security->generatePasswordHash($password);
    }
}
