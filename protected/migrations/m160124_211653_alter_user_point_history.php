<?php

class m160124_211653_alter_user_point_history extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_211653_alter_user_point_history does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->dropTable("user_points_history");
        $this->createTable("user_amount_history", array(
            "id" => "pk",
            "receiver_id" => "INT(11) DEFAULT NULL",
            "sender_id" => "INT(11) DEFAULT NULL",
            "amount" => "DOUBLE DEFAULT NULL",
            "type" => "ENUM('GRANDED_BY_ADMIN', 'FIRST_MATRIX', 'SECONDE_MATRIX', 'PAID')",
            "account_type" => "ENUM('AMOUNT', 'PERSONAL_AMOUNT') DEFAULT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}