<?php

class m160203_123559_alter_user_certificate_transaction extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160203_123559_alter_user_certificate_transaction does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->addColumn('user_certificate_orders', 'price', 'DOUBLE DEFAULT NULL AFTER count');
        $this->addColumn('user_certificate_orders', 'type', 'ENUM("ORDER", "OFFER") DEFAULT "ORDER" AFTER price');
    }

    public function safeDown() {
        
    }

}