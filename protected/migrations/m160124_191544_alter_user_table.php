<?php

class m160124_191544_alter_user_table extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_191544_alter_user_table does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->addColumn('users', 'amount', 'DOUBLE DEFAULT NULL AFTER parent_id');
        $this->addColumn('users', 'personal_amount', 'DOUBLE DEFAULT NULL AFTER amount');
        $this->addColumn('users', 'is_partner', 'ENUM("YES", "NO") DEFAULT "NO" AFTER personal_amount');
    }

    public function safeDown() {
        
    }

}