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
	public function getSgbd(){
		return $this->$this->conn['sgbd'];
	}

	public function getAdress(){
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
}

?>