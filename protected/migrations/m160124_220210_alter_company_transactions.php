<?php

class m160124_220210_alter_company_transactions extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_220210_alter_company_transactions does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->addColumn('company_transactions', 'amount_type', 'ENUM("INCOME", "OUTCOME") DEFAULT "INCOME" AFTER amount');
        $this->addColumn('company_transactions', 'description', 'VARCHAR(500) DEFAULT NULL AFTER amount_type');
    }

    public function safeDown() {
        
    }

}