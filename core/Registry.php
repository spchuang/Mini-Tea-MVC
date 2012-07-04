<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Registry Class
 * 
 * A singleton class that stores the instances of existing objects(libraries, models …)
 * It uses singleton design pattern
 *
 * @author	Samping Chuang
 * @Date	May 23, 2012
 */
class Class_Registry
{ 

	private static $_classes = array();
	private static $_instance;
	
	// private constructo
	private function __construct() { }
	
	// disallow cloning
	private function __clone(){ }
	
    public static function getInstance()
    {
    	if(!isset(self::$_instance))
        {
            //First and only construction.
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //get an object from the registry by key
    protected function get($key)
    {
    	
        if(isset($this->_classes[$key]))
        {	
        	/*echo "<pre>";
        	var_dump($this->_classes);
        	echo "</pre>";*/
            return $this->_classes[$key];
        }
        return NULL;
    }

    protected function set($key,$object)
    {
        $this->_classes[$key] = $object;
    }
    
    // Handles retriving and storing objects
    static function getObject($key)
    {
		return self::getInstance()->get($key);
	}
	static function storeObject($key, $object)
	{
		return self::getInstance()->set($key,$object);
	}
}

