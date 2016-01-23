<?php

class m160122_193027_add_user_points_history extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160122_193027_add_user_points_history does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->createTable("user_points_history", array(
            "id" => "pk",
            "user_id" => "INT(11) DEFAULT NULL",
            "partner_id" => "INT(11) DEFAULT NULL",
            "points" => "FLOAT DEFAULT NULL",
            "type" => "ENUM('GRANDED_BY_ADMIN', 'FIRST_MATRIX', 'SECONDE_MATRIX', 'PAID', 'PARTNER')",
            "created_date" => "DATETIME",
        ));
    }

    public function safeDown() {
        
    }

}