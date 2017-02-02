<?php
class Database{

	private $host = 'localhost';
	private $dbname = 'phpajaxcrudlevel1';
	private $username = 'root';
	private $password = '';
	public $con;

	public function getConnection(){
		
		$this->con = null;
		try{
			$this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
		}catch(PDOException $e){
			echo "Connection error: " . $e->getMessage();
		}

		return $this->con;
	}
}


?>