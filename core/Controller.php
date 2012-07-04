<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Loader Class
 * 
 * Responsible for loading model, view and things like library
 *
 * @author	Samping Chuang
 * @Date	May 23, 2012
 */
Class Loader
{
    function __construct(){}
	
	//model names has to be like areas_model
    public function model($class='')
    {
    	if ($class == ''){ 
    		die("Specify a model name!");
    	}
        $publicName  = strtolower($class);

        // Instantiate the Super Object.
        $c =& Controller::getInstance();
        
        //This allows us to do something like $this->model_name->model_function
        $c->$publicName = load_class($class, 'application/models');
    }
    
    //model names has to be like areas_model
    public function session($class='')
    {
    	if ($class == ''){ 
    		die("Specify a session name!");
    	}
        $publicName  = strtolower($class);

        // Instantiate the Super Object.
        $c =& Controller::getInstance();
        
        //This allows us to do something like $this->model_name->model_function
        $c->$publicName = load_class($class, 'application/sessions');
    }
    
    //$viewFile can include directory like "areas/test";
	public function viewFile($viewFile = '',  $data=array()){
		if($viewFile == ''){
			die("Specify a view template!");
		}
		
		// import the $data array into the symbol table variables
		// example: $data['title'] can now be used as $title
		if(sizeof($data) > 0){
			extract($data, EXTR_SKIP);
		}

		$viewFilePath = BASE_PATH .'/application/views/' . $viewFile . '.php';

		if (file_exists($viewFilePath)){
			include($viewFilePath);
		}else{
			die($viewFile . " is not found!");
		}
		
	}
}

/**
 * Base Controller
 *
 */
class Controller extends Loader
{
	private static $instance;
	public $load;
	
	public function __construct()
	{
		$this->load = $this;
		self::$instance = $this->load;
	}
	
	public static function getInstance()
	{
		return self::$instance;
	}
	
}