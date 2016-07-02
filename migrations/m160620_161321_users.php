<?php

use yii\db\Migration;

class m160620_161321_users extends Migration
{
    public function up()
    {
        $tableOptions = null; 
            if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
 
        $this->createTable('Users', [
            'user_id' => $this->primaryKey(),
            'user_surname' => $this->string(100)->notNull(),
            'user_name' => $this->string(100)->notNull(),
            'user_patronymic' => $this->string(100),
            'user_email' => $this->string(255)->notNull(),
            'user_password' => $this->text(256)->notNull(),
            'user_phone_number' => $this->integer(10),
            'user_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'user_signup_at' => $this->timestamp()->notNull(),
            'user_signin_at' => $this->timestamp(),
        ], $tableOptions);
 
        $this->createIndex('users_user_id', 'Users', 'user_id');
        $this->createIndex('users_user_name', 'Users', 'user_name');
        $this->createIndex('users_user_email', 'Users', 'user_email');
        $this->createIndex('users_phone_number', 'Users', 'user_phone_number');
        $this->createIndex('users_user_status', 'Users', 'user_status');
        $this->createIndex('users_signup_at', 'Users', 'user_signup_at');
        $this->createIndex('users_signin_at', 'Users', 'user_signin_at');
    }

    public function down()
    {
        echo "m160620_161321_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
