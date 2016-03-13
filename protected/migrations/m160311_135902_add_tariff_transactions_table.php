<?php

class m160311_135902_add_tariff_transactions_table extends CDbMigration
{
    public function safeUp() {
        $this->createTable("tariff_transaction", array(
            "id" => "pk",
            "user_tariff" => "INT(11) NOT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
    }
}