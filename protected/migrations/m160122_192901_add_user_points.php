<?php

class m160122_192901_add_user_points extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160122_192901_add_user_points does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("user_points", array(
            "id" => "pk",
            "user_id" => "INT(11) DEFAULT NULL",
            "points" => "FLOAT DEFAULT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}