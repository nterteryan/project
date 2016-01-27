<?php

class m160127_210148_alter_user_orders extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160127_210148_alter_user_orders does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->alterColumn('user_orders', 'amount', 'DOUBLE DEFAULT NULL'); 
    }

    public function safeDown() {
        
    }

}