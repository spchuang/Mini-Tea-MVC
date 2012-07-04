<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Base Session Class
 * 
 * @author	Samping Chuang
 * @Date	May 24, 2012
 *
 */
class Session
{
	private $_session = NULL;
	function __construct() {
		session_start();
		$this->_session = & $_SESSION;
	}
	function __destruct() {
	
	}
	
	//override default set function
	//allow use: $this->session->user = sam?
	public function __set($key, $value)
	{
		$this->_session[$key] = $value;	
	}
	
	//override default get function
	public function __get($key)
	{
        if (isset($this->_session[$key])) {
            return $this->_session[$key];
        }
		echo "session [".$key."]  not found!";
        return NULL; 
    }
    
    public function __isset($key)
    {
    	return isset($this->_session[$key]);
    }
    public function clear_session()
    {
    	session_unset();
    }

    public function show_session()
    {
    	if(DEBUG_ON == true)
    	{
    		echo "<pre>";
    		var_dump($this->_session);
    		echo "</pre>";
    	}
    }
    
}