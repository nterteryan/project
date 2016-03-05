<?php

class m160304_104905_alter_user_transactions_table extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m160304_104905_alter_user_transactions_table does not support migration down.\n";
//		return false;
//	}
	public function safeUp()
	{
		$this->execute("ALTER TABLE `user_transactions` CHANGE `transaction_type` `transaction_type` ENUM('GRANDED_BY_ADMIN','FIRST_MATRIX','SECONDE_MATRIX','BUY','TRANSFER','CHARGE','REFFERAL','INVESTMANT') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL;");
	}
	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}