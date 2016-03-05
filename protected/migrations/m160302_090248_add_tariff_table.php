user<?php

class m160302_090248_add_tariff_table extends CDbMigration
{
//	public function up()
//	{
//	}

//	public function down()
//	{
//		echo "m160302_090248_add_tariff_table does not support migration down.\n";
//		return false;
//	}
	public function safeUp() {
	    $this->createTable("tariff", array(
	        "id" => "pk",
	        "name" => "VARCHAR(255) NOT NULL",
	        "description" => "TEXT NOT NULL",
	        "status" => "ENUM('ACTIVE', 'BLOCKED') NOT NULL DEFAULT 'BLOCKED'",
	        "amount" => "INT(11) DEFAULT NULL",
	        "percent" => "INT(11) DEFAULT NULL",
	        "close_month" => "INT(11)",
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