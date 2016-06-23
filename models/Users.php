<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $idUser
 * @property string $auth_key
 * @property string $fname
 * @property string $name
 * @property string $lname
 * @property string $email
 * @property string $hashPassword
 * @property string $telephone
 * @property integer $active
 * @property integer $uroleId
 * @property string $datecreate
 * @property string $lastupdate
 *
 * @property Activation[] $activations
 * @property Company[] $companies
 * @property UserPictures[] $userPictures
 * @property UserRole[] $userRoles
 * @property Visits[] $visits
 * @property WorkersOfCompany[] $workersOfCompanies
 */
class Users extends \yii\db\ActiveRecord
{
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'auth_key' => 'Auth Key',
            'fname' => 'Fname',
            'name' => 'Name',
            'lname' => 'Lname',
            'email' => 'Email',
            'hashPassword' => 'Hash Password',
            'telephone' => 'Telephone',
            'active' => 'Active',
            'uroleId' => 'Urole ID',
            'datecreate' => 'Datecreate',
            'lastupdate' => 'Lastupdate',
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
        return $this->hasMany(Company::className(), ['userId' => 'idUser']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkersOfCompanies()
    {
        return $this->hasMany(WorkersOfCompany::className(), ['userId' => 'idUser']);
    }
}
