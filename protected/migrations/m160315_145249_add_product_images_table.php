<?php

class m160315_145249_add_product_images_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160315_145249_add_product_images_table does not support migration down.\n";
	// 	return false;
	// }
	public function safeUp() {
	    $this->createTable("product_images", array(
			"id"           => "pk",
			"product_id"   => "INT(11) NOT NULL",
			"main"         => "INT(11) NOT NULL",
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