<?php

class m160315_121205_add_category_products_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160315_121205_add_category_products_table does not support migration down.\n";
	// 	return false;
	// }
	

	public function safeUp() {
	    $this->createTable("category_products", array(
			"id"           => "pk",
			"category_id"  => "INT(11) NOT NULL",
			"product_id"   => "INT(11) NOT NULL",
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