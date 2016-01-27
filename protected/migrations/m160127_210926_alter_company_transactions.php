<?php

class m160127_210926_alter_company_transactions extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160127_210926_alter_company_transactions does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->dropTable("company_transactions");
    }

    public function safeDown() {
        
    }

}