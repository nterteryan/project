<?php

class m160124_161750_add_marketing_plan extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160124_161750_add_marketing_plan does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
       $this->createTable("marketing_plans", array(
            "id" => "pk",
            "name" => "VARCHAR(255) DEFAULT NULL",
            "slug" => "VARCHAR(255) DEFAULT NULL",
            "join_amount" => "INT(11) DEFAULT NULL",
            "created_date" => "DATETIME",
            "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        ));
       
       $this->insert('marketing_plans', array(
            'name' => 'Легкий Старт',
            'slug' => 'matrix1',
            'join_amount' => 25,
        ));
       $this->insert('marketing_plans', array(
            'name' => 'Быстрый Старт',
            'slug' => 'matrix2',
            'join_amount' => 75,
        ));
       $this->insert('marketing_plans', array(
            'name' => 'Акционер',
            'slug' => 'partner',
            'join_amount' => 100,
        ));
    }

    public function safeDown() {
        
    }

}