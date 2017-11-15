<?php

//IMPLEMENTAR ITERFACE

interface Conn{
	//
	function connect($address, $user, $pwd, $port, $sgbd);
}

class DBConn{
	private $conn = array(
			'address',
			'user',
			'password',
			'port',
			'status' => false,
			'sgbd',
			'error'
		);
	private $PDO_obj;
	//
	function __construct($address, $user, $pwd, $port, $sgbd = "sqlite"){
		$this->connect($address, $user, $pwd, $port, $sgbd);
	}
	//
	private function connect($address, $user, $pwd, $port, $sgbd){
		try{
			$this->PDO_obj = new PDO("{$sgbd}:{$address}", $user, $pwd);
			$this->setAddress($address);
			$this->setUser($user);
			$this->setPassword($pwd);
			$this->setPort($port);
			$this->setSGBD($sgbd);
			$this->setConnectionStatus();
		}catch(PDOException $e){
			$this->conn_error = $e->getMessage();
		}
	}
	//
	private function setAddress($address){
		$this->conn['address'] = $address;
	}
	private function setUser($user){
		$this->conn['user'] = $user;
	}
	private function setPassword($pwd){
		$this->conn['password'] = $pwd;
	}
	private function setPort($port){
		$this->conn['port'] = $port;
	}
	private function setSGBD($SGBD){
		$this->conn['sgbd'] = $SGBD;
	}
	private function setConnectionStatus(){
		$this->conn['status'] = true;
	}
	//
	##Public Methods
	public function getSGBD(){
		return $this->conn['sgbd'];
	}

	public function getAddress(){
		return $this->conn['address'];
	}

	public function getUser(){
		return $this->conn['user'];
	}

	public function getPassword(){
		return $this->conn['password'];
	}
	##Gets Functions

	public function getConnectionStatus(){
		return $this->conn['status'];
	}

	##Query Functions
	public function select($sql){
		try{
			/*		IMPLEMENTAR PROTEÇÃO GLOBAL DE INJECTION DAS QUERIES DE SELECT
			$statement = $this->PDO_obj->prepare($sql_prepare);
			$statement->execute(array(':productid' => $keys[0], ':productname' => $keys[1], ':supplierid' => $keys[2], ':categoryid' => $keys[3], ':quantityperunit' => $keys[4], ':unitprice' => $keys[5], ':totalvalue' => $keys[6], ':unitsinstock' => $keys[7], ':unitsonorder' => $keys[8], ':reorderlevel' => $keys[9], ':discontinued' => $keys[10], ':key' => $keys[0]));
			var_dump($statement);*/
			$ds = $this->PDO_obj->query($sql);
			$ds = $ds->fetchAll(PDO::FETCH_NUM);
			return $ds;

		}catch(PDOException $e){
			$this->conn_error = $e->getMessage();
		}
	}
}

?>