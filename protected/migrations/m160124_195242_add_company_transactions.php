<?php

class m160124_195242_add_company_transactions extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_195242_add_company_transactions does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("company_transactions", array(
            "id" => "pk",
            "amount" => "DOUBLE DEFAULT NULL",
            "type" => "ENUM('COMPANY', 'CHARITY', 'TOTAL', 'ROTATION') DEFAULT 'COMPANY'",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}