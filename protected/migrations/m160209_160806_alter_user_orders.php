<?php

class m160209_160806_alter_user_orders extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160209_160806_alter_user_orders does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->addColumn('user_orders', 'type', 'ENUM("CHARGE", "MARKETING", "PRODUCT", "PREMIUM_ACCOUNT") DEFAULT null AFTER amount');
    }

    public function safeDown() {
        
    }

}