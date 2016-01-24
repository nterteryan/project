<?php

class m160124_131535_alter_table_users extends CDbMigration
{
	/*public function up()
	{
	}

	public function down()
	{
		echo "m160124_131535_alter_table_users does not support migration down.\n";
		return false;
	}*/

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->execute("ALTER TABLE `users` ADD `username` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL AFTER `parent_id`;");
	}

	public function safeDown()
	{
	}
	
}