<?php

class m160127_212731_add_company_transactions extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160127_212731_add_company_transactions does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->execute("CREATE TABLE `company_transactions` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `receiver_id` int(11) DEFAULT NULL,
            `sender_id` int(11) DEFAULT NULL,
            `amount` double DEFAULT NULL,
            `transaction_type` enum('SECONDE_MATRIX', 'BUY','PARTNER', 'FEE') DEFAULT NULL,
            `account_type` enum('COMPANY', 'CHARITY', 'FEE', 'COMMON', 'ROTATION') DEFAULT NULL,
            `created_date` datetime DEFAULT NULL,
            `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
    }

    public function safeDown() {
        
    }

}