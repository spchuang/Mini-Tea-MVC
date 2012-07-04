Mini Tea MVC
================
A very lightweight custom MVC framework in PHP. A lot of the style is built upon Codeigniter.

Installation
------------
1.  Clone or download the repo

2.  Set up the correct database login information in config.php

Usage
-----
1.  Setting up the controller

    ```php
    <?php

	class Home extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			//default method
		}	

    ```
	
2.  Loading view file in the controller

    ```php
    	$this->load->viewFile("home");			
    	$this->load->viewFile("home", $data);	//padding an array of data to the view file
    ```
	
3.  Setting up the Model

    ```php
    <?php

	class Home_model extends Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load_database();	//load database
		}
    ```
	
4.  Loading Model file in the controller

    ```php
    <?php
	
	//Load in the controller constructor function
	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model");
	}
    ```

5.  Loading Query in the Model

    ```php
    <?php
	
	//model file
	//example of how to query database and retrieve the results
	public function get_query_result()
	{
		$sql = "select * from test_db";
		$query = $this->db->query($sql);
		
		//Complete array result
		$result = $query->result_array();
		
		//result of first row
		$firsts_row = $query->first_row();
	
	}
    ```


6.  Call model function from the controller and load the data to view

    ```php
    <?php
	
	public function index()
	{
		$data['result']  = $this->home_model->get_query_result();
		$data['title'] = "Home"; 
		$this->load->viewFile("home", $data);
	}
    ```
    
7.  Set up custom Session class
	```php
	<?php

	class Example_auth extends Session
	{
		public function __construct()
		{
			parent::__construct();
		}
	
		public function test_authenticate()
		{
			return true;
		}
	
	}
	```
	 
7.  Load Session class and call validate function
	```php
	class Home extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->session("example_auth");
		}
		
		//default method
		public function index()
		{
			if(!$this->example_auth->test_authenticate())
				die("You are not authenticated to view the page! :(");
		}
	}
	```
	
8. Set up Global function in helper/helper_func.php

9. Connect by using ?controller=home&method=method_name

Requirements
------------
*  PHP version 5.1.6 or newer

Notes
-----

*  open source contributions welcome :)
