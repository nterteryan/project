<?php

class m160310_115205_add_user_tariff_transactions_table extends CDbMigration
{

	    public function safeUp() {
	        $this->createTable("user_tariff_transaction", array(
	            "id" => "pk",
	            "user_tariff" => "INT(11) NOT NULL",
				"status" => "ENUM('INCOME', 'OUTCOME') NOT NULL DEFAULT 'INCOME'",
				"user_transaction" => "INT(11) NOT NULL",
	            "created_date" => "DATETIME",
	            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
	        ));
	    }
	    
}