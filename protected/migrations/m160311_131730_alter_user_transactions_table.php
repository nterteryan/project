<?php

class m160311_131730_alter_user_transactions_table extends CDbMigration
{

	public function safeUp() {
	    $this->execute("CREATE TABLE `user_transactions` (
	        `id` int(11) NOT NULL AUTO_INCREMENT,
	        `receiver_id` int(11) DEFAULT NULL,
	        `sender_id` int(11) DEFAULT NULL,
	        `amount` double DEFAULT NULL,
	        `transaction_type_id` int(11) DEFAULT NULL,
	        `transaction_type` enum('tariff','premium','certificate') DEFAULT NULL,
	        `type` enum('GRANDED_BY_ADMIN','FIRST_MATRIX','SECONDE_MATRIX','BUY','TRANSFER','CHARGE','REFFERAL','INVESTMANT') DEFAULT NULL,
	        `account_type` enum('AMOUNT','PERSONAL_AMOUNT') DEFAULT NULL,
	        `amount_type` enum('INCOME','OUTCOME') DEFAULT NULL,
	        `created_date` datetime DEFAULT NULL,
	        `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	        PRIMARY KEY (`id`)
	      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
	}
}