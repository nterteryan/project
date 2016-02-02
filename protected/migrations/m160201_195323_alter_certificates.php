<?php

class m160201_195323_alter_certificates extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160201_195323_alter_certificates does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->addColumn('certificates', 'more_description', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown() {
        
    }

}