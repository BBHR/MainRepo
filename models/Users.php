<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $idUser
 * @property string $auth_key
 * @property string $user_surname
 * @property string $user_name
 * @property string $user_patronymic
 * @property string $user_email
 * @property string $user_password
 * @property string $user_phone_number
 * @property integer $user_status
 * @property string $user_signup_at
 * @property string $user_lastupdate
 *
 * @property Activation[] $activations
 * @property Company[] $companies
 * @property Employees[] $employees
 * @property UserPictures[] $userPictures
 * @property UserRole[] $userRoles
 * @property Visits[] $visits
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['auth_key', 'user_surname', 'user_name', 'user_email', 'user_password', 'user_phone_number', 'user_status', 'user_signup_at', 'user_lastupdate'], 'required'],
            [['user_status'], 'integer'],
            [['user_signup_at', 'user_lastupdate'], 'safe'],
            [['auth_key'], 'string', 'max' => 32],
            [['user_surname', 'user_name', 'user_patronymic'], 'string', 'max' => 100],
            [['user_email', 'user_password'], 'string', 'max' => 255],
            [['user_phone_number'], 'string', 'max' => 20],
            [['user_email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'auth_key' => 'Auth Key',
            'user_surname' => 'User Surname',
            'user_name' => 'User Name',
            'user_patronymic' => 'User Patronymic',
            'user_email' => 'User Email',
            'user_password' => 'User Password',
            'user_phone_number' => 'User Phone Number',
            'user_status' => 'User Status',
            'user_signup_at' => 'User Signup At',
            'user_lastupdate' => 'User Lastupdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivations()
    {
        return $this->hasMany(Activation::className(), ['userId' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['user_id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['user_id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPictures()
    {
        return $this->hasMany(UserPictures::className(), ['userId' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::className(), ['userId' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::className(), ['userId' => 'idUser']);
    }

}
