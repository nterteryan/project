<?php

class m160205_172119_alter_table_users extends CDbMigration {
    /* public function up()
      {
      }

      public function down()
      {
      echo "m160205_172119_alter_table_users does not support migration down.\n";
      return false;
      } */

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->execute("ALTER TABLE `users` ADD `type` ENUM('FOUNDER','CO_FOUNDER','PARTNER','MEMBER') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'MEMBER' AFTER `is_partner`;");
    }

    public function safeDown() {
        
    }

}
