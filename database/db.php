<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * Data base  Class
 *
 * conatinas all the basic qeury functions
 *
 * @author	Samping Chuang
 * @Date	May 23, 2012
 *
 */
class DB 
{
	protected $mysqli;
	function __construct() 
	{
		$this->connect();
	}
	
	protected function connect()
	{
		$this->mysqli = new mysqli(DB_HOST,DB_USER , DB_PASSWORD, DB_DBASE);
		if ($this->mysqli->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}
	
	function __destruct()
	{
		if(isset($this->mysqli)){
			$this->mysqli->close();
		}
	}
	
	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
	 * @access	public
	 * @param	string	Query statement
	 * @return	mixed	an instance of database query result or false
	 */
	public function query($query){ 
		if($r = $this->mysqli->query($query)){
			$rows = array();
			while($row = $r->fetch_assoc()){
				$rows[]= $row;
			}
			$result = new DB_result($rows, $query);
			return $result;
		}
		echo $this->mysqli->error . "<br><br>";
		die("{$query}");

	}

}