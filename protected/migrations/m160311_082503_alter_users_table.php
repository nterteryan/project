<?php

class m160311_082503_alter_users_table extends CDbMigration
{
    public function safeUp() {
        $this->addColumn('users', 'is_premium', 'ENUM("YES", "NO") DEFAULT "NO" AFTER personal_amount');
    }
}