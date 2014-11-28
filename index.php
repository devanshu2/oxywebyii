<?php
define('MAIN_BASE_PATH', dirname(__FILE__));
define('CLOUD_IMG_PATH','http://d31mnxm13m6gic.cloudfront.net/');
//session_save_path('/usr/share/nginx/oxyfryer/session');
//ini_set('session.gc_probability', 1);
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main.php';

if ($_SERVER['HTTP_HOST'] == 'localhost') {
	// remove the following lines when in production mode
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	// specify how many levels of call stack should be shown in each log message
	defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
	
	$config=dirname(__FILE__).'/protected/config/main_local.php';
} elseif ($_SERVER['HTTP_HOST'] == 'test.kelltontech.com') {
	$config=dirname(__FILE__).'/protected/config/main_test.php';
}
else {
	session_save_path('/usr/share/nginx/oxyfryer/session');
	ini_set('session.gc_probability', 1);
}

// disabling notice
define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_ENABLE_EXCEPTION_HANDLER', false);
error_reporting(E_ALL ^ E_NOTICE);

require_once($yii);
Yii::createWebApplication($config)->run();
