<?php

class m160221_154045_alter_user_transaction extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160221_154045_alter_user_transaction does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
       $this->execute("ALTER TABLE `user_transactions` CHANGE `transaction_type` `transaction_type` ENUM('GRANDED_BY_ADMIN','FIRST_MATRIX','SECONDE_MATRIX','BUY','TRANSFER','CHARGE','REFFERAL', 'PARTNER') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL;");
    }

    public function safeDown() {
        
    }

}