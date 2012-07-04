<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Main Fayum Website Initialization File
 *
 * Loads the base classes and executes the request.
 *
 */
 
//parse the parameters...
 
 
// Load the file containing common functions
require_once BASE_PATH.'/core/Common.php';

// Load the registry class
require_once BASE_PATH.'/core/Registry.php';

// Load the base session class
require_once BASE_PATH.'/core/Session.php';

// Load the base controller class
require_once BASE_PATH.'/core/Controller.php';

// Load the base Model class
require_once BASE_PATH.'/core/Model.php';

// Load the DB result class
require_once BASE_PATH.'/database/DB_result.php';

//Load Helper functions
require_once BASE_PATH.'/helper/helper_func.php';



// Instantiate the requested constroller
if(isset($_GET[DEFAULT_CONTROLLER_NAME])){
	$controller = $_GET[DEFAULT_CONTROLLER_NAME];
}else{
	$controller = DEFAULT_CONTROLLER;
}

$controllerPath = BASE_PATH . '/application/controllers/'. strtolower($controller) . '.php';

//The first character of the controller name should always be capitalize
$cName = ucfirst(strtolower($controller));

if (!file_exists($controllerPath)){
	die($cName . " is not found!");
}
require_once($controllerPath);

//declare new controller instance
$FY = new $cName; 


// Call the requested method
if(isset($_GET[DEFAULT_METHOD_NAME])){
	$method = $_GET[DEFAULT_METHOD_NAME];
}else{
	$method = 'index';
}

if (method_exists($FY, $method)){
	call_user_func_array(array($FY,$method), array());
}else{
	die("the method {$method} doesn't exists in {$FY}...");
}

// close the DB connection?