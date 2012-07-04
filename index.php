<?php	
   
//load constants file
require_once('Config.php');

//Set error report
if (defined('DEBUG_ON'))
{
	switch (DEBUG_ON)
	{
		case true:
			error_reporting(E_ERROR | E_PARSE | E_NOTICE);
			ini_set('display_errors', 1);
		break;
	
		case false:
			error_reporting(0);
		break;

		default:
			die('The debug environment is not set correctly.');
	}
}

//load main application
require_once (BASE_PATH . '/'. SYSTAM_PATH. '/Base.php');