<?php

class m160318_085958_alter_user_tariff_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160318_085958_alter_user_tariff_table does not support migration down.\n";
	// 	return false;
	// }

	public function safeUp(){
		$this->dropTable("user_tariff");
		$this->createTable("user_tariff", array(
			"id"             => "pk",
			"user_id"        => "INT(11) NOT NULL",
			"tariff_id"      => "INT(11) NOT NULL",
			"amount"         => "INT(11) NOT NULL",
			"percent"        => "FLOAT NOT NULL",
			"status"         => "ENUM('IN_PROGRESS','CLOSED','PAID','REFUND') NOT NULL DEFAULT 'IN_PROGRESS'",
			"amount_percent" => "FLOAT NOT NULL",
			"total_percent"  => "FLOAT NOT NULL",
			"close_month"    => "INT(11)",
			"refund_date"    => "DATETIME",
			"created_date"   => "DATETIME",
			"updated_date"   => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
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