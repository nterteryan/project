<?php

class m160127_203251_alter_user_amount_history extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160127_203251_alter_user_amount_history does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->renameTable('user_amount_history', 'user_transactions');
        $this->renameColumn('user_transactions', 'type', 'transaction_type');
        $this->alterColumn('user_transactions', 'transaction_type', 'ENUM("GRANDED_BY_ADMIN", "FIRST_MATRIX", "SECONDE_MATRIX", "BUY", "TRANSFER", "CHARGE") DEFAULT NULL'); 
    }

    public function safeDown() {
        
    }

}