<?php

class m160124_193403_delete_user_points extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_193403_delete_user_points does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->dropTable("user_points");
    }

    public function safeDown() {
        
    }

}