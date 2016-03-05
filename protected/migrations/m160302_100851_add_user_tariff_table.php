<?php

class m160302_100851_add_user_tariff_table extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m160302_100851_add_user_tariff_table does not support migration down.\n";
//		return false;
//	}
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable("user_tariff", array(
			"id" => "pk",
			"user_id" => "INT(11) NOT NULL",
			"tariff_id" =>"INT(11) NOT NULL",
			"created_date" => "DATETIME",
			"updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
		));
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