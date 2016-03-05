<?php

class m160305_093644_add_user_image_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160305_093644_add_user_image_table does not support migration down.\n";
	// 	return false;
	// }
    public function safeUp() {
        $this->createTable("user_image", array(
            "id" => "pk",
            "user_id" => "INT(11) NOT NULL",
            "image" => "VARCHAR(255) NOT NULL",
			"status" =>"ENUM('ACTIVE', 'BLOCKED') NOT NULL DEFAULT 'ACTIVE'",
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