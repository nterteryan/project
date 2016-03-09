user<?php

class m160302_090248_add_tariff_table extends CDbMigration
{

	public function safeUp() {
	    $this->createTable("tariff", array(
	        "id" => "pk",
	        "name" => "VARCHAR(255) ",
	        "description" => "TEXT ",
	        "status" => "ENUM('ACTIVE', 'BLOCKED') NOT NULL DEFAULT 'BLOCKED'",
	        "amount" => "INT(11) DEFAULT NULL",
	        "percent" => "float DEFAULT NULL",
	        "close_month" => "INT(11)",
	        "created_date" => "DATETIME",
	        "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
	    ));
	    $this->insert('tariff',array(
	           'amount'=>'25',
	           'percent'=>'0.5',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));		
	    $this->insert('tariff',array(
	           'amount'=>'50',
	           'percent'=>'0.5',
	           'close_month' =>'1',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));
	    $this->insert('tariff',array(
	           'amount'=>'100',
	           'percent'=>'0.6',
	           'close_month' =>'1',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));
	    $this->insert('tariff',array(
	           'amount'=>'250',
	           'percent'=>'0.6',
	           'close_month' =>'1',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));
	    $this->insert('tariff',array(
	           'amount'=>'500',
	           'percent'=>'0.7',
	           'close_month' =>'1',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));
	    $this->insert('tariff',array(
	           'amount'=>'1000',
	           'percent'=>'0.8',
	           'close_month' =>'1',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));
	   
	}
	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}