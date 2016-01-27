<?php

class m160126_121120_add_user_pmoney_payments extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160126_121120_add_user_pmoney_payments does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("user_pmoney_payments", array(
            "id" => "pk",
            "order_num" => "INT(11) DEFAULT NULL",
            "payee_account" => "CHAR(20) DEFAULT NULL",
            "payment_amount" => "DOUBLE DEFAULT NULL",
            "payer_account" => "CHAR(20) DEFAULT NULL",
            "payment_units" => "CHAR(20) DEFAULT NULL",
            "payment_batch_num" => "CHAR(20) DEFAULT NULL",
            "payment_id" => "CHAR(20) DEFAULT NULL",
            "suggested_memo" => "CHAR(20) DEFAULT NULL",
            "v2_hash" => "CHAR(50) DEFAULT NULL",
            "timestamp_gmt" => "CHAR(50) DEFAULT NULL",
            "customer_number" => "INT(11) DEFAULT NULL",
            "key_code" => "VARCHAR(255) DEFAULT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }

    public function safeDown() {
        
    }

}