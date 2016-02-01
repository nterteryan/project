<?php

class m160131_085425_add_certificates extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160131_085425_add_certificates does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->execute("CREATE TABLE `certificates` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `description` varchar(255) DEFAULT NULL,
            `count` double DEFAULT NULL,
            `start_price` double DEFAULT NULL,
            `current_price` double DEFAULT NULL,
            `created_date` datetime DEFAULT NULL,
            `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
        
        $this->execute("CREATE TABLE `user_certificates` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) DEFAULT NULL,
            `certificate_id` int(11) DEFAULT NULL,
            `count` double DEFAULT NULL,
            `created_date` datetime DEFAULT NULL,
            `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
        
        $this->execute("CREATE TABLE `user_certificate_orders` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `buyer_id` int(11) DEFAULT NULL,
            `seller_id` int(11) DEFAULT NULL,
            `certificate_id` int(11) DEFAULT NULL,
            `user_transaction_id` int(11) DEFAULT NULL,
            `count` double DEFAULT NULL,
            `created_date` datetime DEFAULT NULL,
            `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");
    }

    public function safeDown() {
        
    }

}