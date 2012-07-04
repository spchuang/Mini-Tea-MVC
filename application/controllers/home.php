<?php

class Home extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model");
		$this->load->session("example_auth");
	}
	
	//default method
	public function index()
	{
		if(!$this->example_auth->test_authenticate())
			die("You are not authenticated to view the page! :(");
		$data['date']  = $this->home_model->get_date();
		$data['title'] = "Home"; 
		$this->load->viewFile("home", $data);
	}
}
