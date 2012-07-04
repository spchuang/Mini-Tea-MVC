<?php

class Home_model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//load database
		$this->load_database();
	}
	
	public function test()
	{
		
	}
	public function get_date()
	{
		$date = date("F j, Y, g:i a"); 
		return $date;
	}
	
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
}