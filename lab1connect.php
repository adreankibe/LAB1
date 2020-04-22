<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'btc3205');
class DBconnector
{
	public $conn;
	function __construct(){
		$this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die ("error: " .mysqli_connect_error());
		mysqli_select_db($this->conn, DB_NAME);
		
	}

	function getConn()
	{
		return $this->conn;
	}
	public function closeDatabase(){
		mysqli_close($this->conn);
	}
}


 
        
?>