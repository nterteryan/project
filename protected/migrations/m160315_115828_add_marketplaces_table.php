<?php

class m160315_115828_add_marketplaces_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160315_115828_add_marketplaces_table does not support migration down.\n";
	// 	return false;
	// }
	public function safeUp() {
	    $this->createTable("marketplaces", array(
			"id"           => "pk",
			"user_id"      => "INT(11) NOT NULL",
			"title"        => "VARCHAR(255) NOT NULL",
			"logo"         => "VARCHAR(255) NOT NULL",
			"description"  => "VARCHAR(255) NOT NULL",
			"status"       => "ENUM('ACTIVE','UNACTIVE','BLOCKED') NOT NULL  DEFAULT 'ACTIVE'",
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