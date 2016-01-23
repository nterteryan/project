<?php

class m160122_193913_add_user_matrix_first extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160122_193913_add_user_matrix_first does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("user_matrix_first", array(
            "id" => "pk",
            "user_id" => "INT(11) DEFAULT NULL",
            "order_number" => "INT(11) DEFAULT NULL",
            "close_number" => "INT(11) DEFAULT NULL",
            "is_closed" => "ENUM('YES', 'NO') DEFAULT 'NO'",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}