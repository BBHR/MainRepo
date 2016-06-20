<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $idUser
 * @property string $login
 * @property string $password
 * @property string $fname
 * @property string $name
 * @property string $lname
 * @property integer $phoneNumber
 * @property integer $accessId
 * @property string $datecreate
 * @property string $lastupdate
 * @property integer $status
 *
 * @property Activate[] $activates
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
            [['login', 'password', 'fname', 'name', 'lname', 'phoneNumber', 'accessId', 'datecreate', 'lastupdate', 'status'], 'required'],
            [['phoneNumber', 'accessId', 'status'], 'integer'],
            [['datecreate', 'lastupdate'], 'safe'],
            [['login'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 256],
            [['fname', 'name', 'lname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'login' => 'Login',
            'password' => 'Password',
            'fname' => 'Fname',
            'name' => 'Name',
            'lname' => 'Lname',
            'phoneNumber' => 'Phone Number',
            'accessId' => 'Access ID',
            'datecreate' => 'Datecreate',
            'lastupdate' => 'Lastupdate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivates()
    {
        return $this->hasMany(Activate::className(), ['userId' => 'idUser']);
    }
}
