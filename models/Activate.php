<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activate".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $activation
 * @property string $datecreate
 * @property integer $status
 *
 * @property Users $user
 */
class Activate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'activation', 'datecreate', 'status'], 'required'],
            [['userId', 'status'], 'integer'],
            [['activation'], 'string'],
            [['datecreate'], 'safe'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'activation' => 'Activation',
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
