<?php

class m160221_112746_alter_user_table extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160221_112746_alter_user_table does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
       $this->addColumn('users', 'pin', 'INT(11) DEFAULT NULL AFTER id'); 
    }

    public function safeDown() {
        
    }

}