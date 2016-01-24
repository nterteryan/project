<?php

class m160124_175021_add_user_orders extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_175021_add_user_orders does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("user_orders", array(
            "id" => "pk",
            "user_id" => "INT(11) DEFAULT NULL",
            "marketing_plan_id" => "INT(11) DEFAULT NULL",
            "product_id" => "INT(11) DEFAULT NULL",
            "amount" => "INT(11) DEFAULT NULL",
            "status" => "ENUM('INPROGRESS', 'DECLIEND', 'APPROVED') DEFAULT 'INPROGRESS'",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}