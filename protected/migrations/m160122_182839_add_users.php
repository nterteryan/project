<?php

class m160122_182839_add_users extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160122_182839_add_users does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("users", array(
            "id" => "pk",
            "parent_id" => "INT(11) DEFAULT NULL",
            "email" => "VARCHAR(255) NOT NULL",
            "password" => "VARCHAR(100) NOT NULL",
            "status" => "ENUM('ACTIVE', 'NEW', 'BLOCKED') NOT NULL DEFAULT 'NEW'",
            "role" => "ENUM('SUPER_ADMIN', 'ADMIN', 'USER') NOT NULL DEFAULT 'USER'",
            "first_name" => "VARCHAR(255) DEFAULT NULL",
            "last_name" => "VARCHAR(255) DEFAULT NULL",
            "skype" => "VARCHAR(255) DEFAULT NULL",
            "phone" => "VARCHAR(60) DEFAULT NULL",
            "refferal_code" => "VARCHAR(255) DEFAULT NULL",
            "activation_code" => "VARCHAR(255) DEFAULT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}