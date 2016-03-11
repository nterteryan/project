<?php

class m160310_135440_add_premium_package_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable("premium_package", array(
			"id" => "pk",
			"price" => "INT(11) NOT NULL",
			"close_month" => "INT(11)",
			"status" =>"ENUM('ACTIVE','BLOCKED') NOT NULL DEFAULT 'ACTIVE'",
			"created_date" => "DATETIME",
			"updated_date" => "TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
		));
		$this->insert('premium_package',array(
		       'price'=>'15',
		       'close_month' =>'1',
		       'created_date' =>'2016-03-16 14:21:49',
		       'updated_date' =>'2016-03-16 14:21:49',
		       'status' =>'ACTIVE',
		));				
		$this->insert('premium_package',array(
		       'price'=>'40',
		       'close_month' =>'3',
		       'created_date' =>'2016-03-16 14:21:49',
		       'updated_date' =>'2016-03-16 14:21:49',
		       'status' =>'ACTIVE',
		));				
		$this->insert('premium_package',array(
		       'price'=>'80',
		       'close_month' =>'6',
		       'created_date' =>'2016-03-16 14:21:49',
		       'updated_date' =>'2016-03-16 14:21:49',
		       'status' =>'ACTIVE',
		));			
		$this->insert('premium_package',array(
		       'price'=>'120',
		       'close_month' =>'12',
		       'created_date' =>'2016-03-16 14:21:49',
		       'updated_date' =>'2016-03-16 14:21:49',
		       'status' =>'ACTIVE',
		));		
	}
}