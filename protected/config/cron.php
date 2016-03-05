<?php
return array(
	// This path may be different. You can probably get it from `config/main.php`.
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Cron',
	'preload'=>array('log'),
	'import'=>array(
		'application.components.*',
		'application.models.*',
	),
	// We'll log cron messages to the separate files
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'logFile'=>'cron.log',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CFileLogRoute',
					'logFile'=>'cron_trace.log',
					'levels'=>'trace',
				),
			),
		),

		// Your DB connection

		'db' => array(
			//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			// uncomment the following lines to use a MySQL database
			'connectionString' => 'mysql:host=localhost;dbname=domblaga',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	),
);