<?php
/**
 * Created by PhpStorm.
 * User: bet
 * Date: 18.08.16
 * Time: 21:16
 */

namespace app\models;


use yii\db\ActiveRecord;

class AutoBrand extends ActiveRecord
{
    public static function tableName()
    {
        return 'auto_brands';
    }
}