<?php

class m160315_130604_add_product_views_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160315_130604_add_product_views_table does not support migration down.\n";
	// 	return false;
	// }
	public function safeUp() {
	    $this->createTable("product_views", array(
			"id"           => "pk",
			"viewer_ip"    => "INT(11) NOT NULL",
			"product_id"   => "INT(11) NOT NULL",
			"count"        => "INT(11) NOT NULL",
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