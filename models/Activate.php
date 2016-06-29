<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activation".
 *
 * @property integer $idActivation
 * @property integer $userId
 * @property string $hash_activation
 * @property integer $typeActivation
 * @property string $datecreate
 * @property integer $status
 *
 * @property Users $user
 */
class Activate extends \yii\db\ActiveRecord
{
    const TYPE_EMAIL=1;
    const TYPE_RESET_EMAIL=2;
    const TYPE_RESET_PASSWORD=3;

    public static function tableName()
    {
        return 'activation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'hash_activation', 'typeActivation', 'datecreate', 'status'], 'required'],
            [['userId', 'typeActivation', 'status'], 'integer'],
            [['datecreate'], 'safe'],
            [['hash_activation'], 'string', 'max' => 250],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idActivation' => 'Id Activation',
            'userId' => 'User ID',
            'hash_activation' => 'Hash Activation',
            'typeActivation' => 'Type Activation',
            'datecreate' => 'Datecreate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['idUser' => 'userId']);
    }
}
