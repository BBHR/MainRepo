<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visits".
 *
 * @property integer $idVisit
 * @property integer $userId
 * @property string $sessionId
 * @property string $userIp
 * @property string $browser
 * @property string $visit_time
 * @property string $last_action
 * @property integer $status
 *
 * @property Users $user
 */
class Visits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'sessionId', 'userIp', 'browser', 'visit_time', 'last_action', 'status'], 'required'],
            [['userId', 'status'], 'integer'],
            [['browser'], 'string'],
            [['visit_time', 'last_action'], 'safe'],
            [['sessionId'], 'string', 'max' => 100],
            [['userIp'], 'string', 'max' => 25],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'idUser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVisit' => 'Id Visit',
            'userId' => 'User ID',
            'sessionId' => 'Session ID',
            'userIp' => 'User Ip',
            'browser' => 'Browser',
            'visit_time' => 'Visit Time',
            'last_action' => 'Last Action',
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
