<?php

class m160315_131439_add_products_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160315_131439_add_products_table does not support migration down.\n";
	// 	return false;
	// }
	public function safeUp() {
	    $this->createTable("products", array(
			"id"                => "pk",
			"marketplace_id"    => "INT(11) NOT NULL",
			"user_id"           => "INT(11) NOT NULL",
			"name"              => "VARCHAR(255) NOT NULL",
			"description_brief" => "VARCHAR(255) NOT NULL",
			"description"       => "TEXT  NOT NULL",	
			"price"             => "FLOAT NOT NULL",
			"status"            => "ENUM('enabled','disabled','blocked') NOT NULL DEFAULT 'enabled'",
			"created_date"      => "DATETIME",
			"updated_date"      => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
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