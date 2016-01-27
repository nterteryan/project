<?php

class m160127_210221_create_table_company_accounts extends CDbMigration {
    /* public function up()
      {
      }

      public function down()
      {
      echo "m160127_210221_create_table_company_accounts does not support migration down.\n";
      return false;
      } */

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->execute("CREATE TABLE `company_transactions` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `amount` double DEFAULT NULL,
            `amount_type` enum('INCOME','OUTCOME') COLLATE utf8_bin DEFAULT 'INCOME',
            `description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
            `type` enum('COMPANY','CHARITY','TOTAL','ROTATION') COLLATE utf8_bin DEFAULT 'COMPANY',
            `created_date` datetime DEFAULT NULL,
            `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
    }

    public function safeDown() {
        
    }

}
