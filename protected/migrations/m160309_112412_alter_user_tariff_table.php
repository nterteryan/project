<?php

class m160309_112412_alter_user_tariff_table extends CDbMigration
{
	public function safeUp()
	{
		$this->dropTable("user_tariff");
		$this->createTable("user_tariff", array(
			"id" => "pk",
			"user_id" => "INT(11) NOT NULL",
			"tariff_id" =>"INT(11) NOT NULL",
			"amount" =>"INT(11) NOT NULL",
			"percent" =>"FLOAT NOT NULL",
			"status" =>"ENUM('IN_PROGRESS','CLOSED','PAID') NOT NULL DEFAULT 'IN_PROGRESS'",
			"amount_percent" =>"FLOAT NOT NULL",
			"close_month" => "INT(11)",
			"created_date" => "DATETIME",
			"updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
		));
	}
}