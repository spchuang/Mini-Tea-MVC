<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Load Class
 *
 * Retrieve the class in the registry
 *
 * @param	[string] class name
 * @param	[string] class directory
 * @return	class object
 * 
 * Idea came from Codeigniter source code
 */

if ( ! function_exists('load_class'))
{
	function &load_class($class, $directory=''){
		$r = Class_Registry::getInstance();
		
		//if the object already exists in the registry
		if($r->getObject($class) != NULL){
			$object = $r->getObject($class);
			return $object;
		}
		
		//if not, load the files
		$fullPathName = BASE_PATH .'/'. $directory . '/' . strtolower($class) . '.php';
		
		
		if (file_exists($fullPathName)){
			require_once($fullPathName);
		}else{
			die($class . " is not found!");
		}
		$className = ucfirst(strtolower($class));
		
		//put it in the registry
		$r->storeObject($class, new $className());
		
		$object = $r->getObject($class);
		return $object;
	}
}