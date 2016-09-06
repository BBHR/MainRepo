<?php
/**
 * Created by PhpStorm.
 * User: bet
 * Date: 18.08.16
 * Time: 21:17
 */

namespace app\models;


use yii\db\ActiveRecord;

class AutoWork extends ActiveRecord
{
    public static function tableName()
    {
        return 'auto_work_names';
    }
}