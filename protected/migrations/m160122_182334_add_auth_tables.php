<?php

class m160122_182334_add_auth_tables extends CDbMigration {

    /*public function up() {
        
    }

    public function down() {
        echo "m160122_182334_add_auth_tables does not support migration down.\n";
        return false;
    }*/

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->execute("
            drop table if exists `auth_assignment`;
            drop table if exists `auth_item_child`;
            drop table if exists `auth_item`;

            create table `auth_item`
            (
               `name`                 varchar(64) not null,
               `type`                 integer not null,
               `description`          text,
               `bizrule`              text,
               `data`                 text,
               primary key (`name`)
            ) engine InnoDB;

            create table `auth_item_child`
            (
               `parent`               varchar(64) not null,
               `child`                varchar(64) not null,
               primary key (`parent`,`child`),
               foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
               foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade
            ) engine InnoDB;

            create table `auth_assignment`
            (
               `itemname`             varchar(64) not null,
               `userid`               varchar(64) not null,
               `bizrule`              text,
               `data`                 text,
               primary key (`itemname`,`userid`),
               foreign key (`itemname`) references `auth_item` (`name`) on delete cascade on update cascade
            ) engine InnoDB;
        ");
        
        $this->insert('auth_item', array(
            'name' => 'SUPER_ADMIN',
            'type' => 2,
            'description' => 'Unlimited access',
            'bizrule' => '',
        ));
        
        $this->insert('auth_item', array(
            'name' => 'ADMIN',
            'type' => 2,
            'description' => 'Access only to investor tools',
            'bizrule' => '',
        ));
        $this->insert('auth_item', array(
            'name' => 'USER',
            'type' => 2,
            'description' => 'Access only to owner tools',
            'bizrule' => '',
        ));
    }

    public function safeDown() {
        
    }

}