<?php

class m160309_092424_alter_tariff_table extends CDbMigration
{
	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m160309_092424_alter_tariff_table does not support migration down.\n";
	// 	return false;
	// }
	// 
	// 
	public function safeUp() {
		$this->dropTable("tariff");
	    $this->createTable("tariff", array(
	        "id" => "pk",
	        "name" => "VARCHAR(255) ",
	        "description" => "TEXT ",
	        "status" => "ENUM('ACTIVE', 'BLOCKED') NOT NULL DEFAULT 'BLOCKED'",
	        "amount" => "INT(11) DEFAULT NULL",
	        "percent_founde" =>"FLOAT NOT NULL",
	        "percent_rco_founde" =>"FLOAT NOT NULL",
	        "percent_partner" =>"FLOAT NOT NULL",
	        "percent_member" =>"FLOAT NOT NULL",
	        "close_month" => "INT(11)",
	        "created_date" => "DATETIME",
	        "updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
	    ));

	    $this->insert('tariff',array(
	           'amount'=>'25',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.6',
	    	   'percent_partner' =>'1',
	    	   'percent_member' =>'0.9',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));	
	    $this->insert('tariff',array(
	           'amount'=>'50',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.6',
	    	   'percent_partner' =>'1',
	    	   'percent_member' =>'0.9',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));		
	    $this->insert('tariff',array(
	           'amount'=>'100',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.6',
	    	   'percent_partner' =>'1.2',
	    	   'percent_member' =>'1.1',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));		
	    $this->insert('tariff',array(
	           'amount'=>'250',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.2',
	    	   'percent_partner' =>'1.3',
	    	   'percent_member' =>'1.1',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));		
	    $this->insert('tariff',array(
	           'amount'=>'500',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.2',
	    	   'percent_partner' =>'1.4',
	    	   'percent_member' =>'1.3',
	           'close_month' =>'3',
	           'created_date' =>'2016-03-16 14:21:49',
	           'updated_date' =>'2016-03-16 14:21:49',
	           'status' =>'ACTIVE',
	    ));		
	    $this->insert('tariff',array(
	           'amount'=>'1000',
	    	   'percent_founde' =>'1.5',
	    	   'percent_rco_founde' =>'1.2',
	    	   'percent_partner' =>'1.5',
	    	   'percent_member' =>'1.4',
	           'close_month' =>'3',
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