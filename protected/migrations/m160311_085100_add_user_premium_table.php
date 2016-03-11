<?php

class m160311_085100_add_user_premium_table extends CDbMigration
{
	    public function safeUp() {

	        $this->createTable("user_premium", array(
	            "id" => "pk",
	            "user_id" => "INT(11) NOT NULL",
	            "premium_id" => "INT(11) NOT NULL",
	            "auto_bil" => 'ENUM("YES", "NO") DEFAULT "NO"',
	            "created_date" => "DATETIME",
	            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
	        ));	
	    }
}