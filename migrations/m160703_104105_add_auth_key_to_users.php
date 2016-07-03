<?php

use yii\db\Migration;

/**
 * Handles adding auth_key to table `users`.
 */
class m160703_104105_add_auth_key_to_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn("Users", "auth_key", $this->string(32));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
