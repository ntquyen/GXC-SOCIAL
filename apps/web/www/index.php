<?php

// define START for tracking time processing
define('START',microtime());

require_once(dirname(dirname(__FILE__)).'/config/environment.php');
$environment = new Environment(Environment::DEVELOPMENT) ;
 
// change the following paths if necessary
$yii=CORE_FOLDER.'/yii/framework/yii.php';

defined('YII_DEBUG') or define('YII_DEBUG',$environment->getDebug());
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $environment->getTraceLevel());

require_once($yii);

Yii::setPathOfAlias('common',COMMON_FOLDER);
Yii::setPathOfAlias('core',CORE_FOLDER);
Yii::setPathOfAlias('bootstrap', COMMON_FOLDER.'/extensions/bootstrap');

$globals=COMMON_FOLDER.'/globals.php';
require_once($globals);

Yii::createWebApplication($environment->getConfig())->run();