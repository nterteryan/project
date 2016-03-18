<?php

class m160318_165328_alter_category_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160318_165328_alter_category_table does not support migration down.\n";
	// 	return false;
	// }
	public function safeUp() {
		$this->dropTable("category");
	    $this->createTable("category", array(
			"id"             => "pk",
			"marketplace_id" => "INT(11) NOT NULL",
			"parent_id"      => "INT(11) ",
			"title"          => "VARCHAR(255) NOT NULL",
			"icone"          => "VARCHAR(255) NOT NULL",
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