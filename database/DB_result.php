<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');
/**
 * Database Result Class
 *
 * Basic class that handles query results 
 *
 * @author	Samping Chuang
 */
class DB_result{

	var $result_array	= array();
	var $num_rows		= 0;
	var $query 			= NULL;
	var $num_fields 	= NULL;
	
	function __construct($result, $query) 
	{
		$this->result_array = $result;
		$this->num_rows 	= count($result);
		$this->query 		= $query;
		
	}
	
	public function result_array()
	{
		if($this->num_rows>0)
		{
			return $this->result_array;
		}
		
		//empty results
		return array();
	}
	
	public function row_array($row_num=0)
	{
		if(isset($this->result_array[$row_num]))
		{
			return $this->result_array[$row_num];
		}
		return array();
	}
	
	public function first_row()
	{
		return $this->row_array(0);
	}
	public function last_row()
	{
		return $this->row_array($this->num_rows-1);
	}
	public function num_fields()
	{
		if($this->num_fields == NULL)
		{
			if($this->num_rows>0)
			{	
				$this->num_fields 	= count($this->result_array[0]);
			}else{
				$this->num_fields	= 0;
			}
		}	
		return $this->num_fields;
	}
	
}