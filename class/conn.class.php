<?php 

class Conn{
##Conection Variables
	private $conn_address = '';
	private $conn_user = '';
	private $conn_pwd = '';
##Connection Status
	private $conn_status = false;
##Connection Errors
	public $conn_error = '';
	private $conn_obj = '';

##Constructor
	function __construct($sgbd, $address, $user, $pwd){
		$this->connect($sgbd, $address, $user, $pwd);
	}
//
##Private Methods
	private function connect($sgbd, $address, $user, $pwd){
		try{
			$this->conn_obj = new PDO("{$sgbd}:{$address}", $user, $pwd);
			$this->setAddress($address);
			$this->setUser($user);
			$this->setPassword($pwd);
			$this->setConnectionStatus();
		}catch(PDOException $e){
			$this->conn_error = $e->getMessage();
		}
	}
	private function setAddress($address){
		$this->conn_address = $address;
	}
	private function setUser($user){
		$this->conn_user = $user;
	}
	private function setPassword($pwd){
		$this->conn_pwd = $pwd;
	}
	private function setConnectionStatus(){
		$this->conn_status = true;
	}
//
##Public Methods
	public function getSgbd(){
		return $this->conn_sgbd;
	}

	public function getAdress(){
		return $this->conn_address;
	}

	public function getUser(){
		return $this->conn_user;
	}

	public function getPassword(){
		return $this->conn_pwd;
	}
	##Gets Functions

	public function getStatus(){
		return $this->conn_status;
	}
##Query lookup methods
	public function query_select($sql){
		$arr_retorno = array();

		$result = $this->conn_obj->query($sql);
		if($result){
			$result = $result->fetchAll(PDO::FETCH_NUM);
			foreach ($result as $row) {
				$arr_retorno[] = $row;
			}
			
		}
		return $arr_retorno;
		
	}
	public function query_update($keys){
		try{

			//Injection Protection
			$sql = "UPDATE products SET productid = :productid, productname = :productname, supplierid = :supplierid, categoryid = :categoryid, quantityperunit = :quantityperunit, unitprice = :unitprice, totalvalue = :totalvalue, unitsinstock = :unitsinstock, unitsonorder = :unitsonorder, reorderlevel = :reorderlevel, discontinued = :discontinued WHERE productid = :key";

			$statement = $this->conn_obj->prepare($sql);
			$statement->execute(array(':productid' => $keys[0], ':productname' => $keys[1], ':supplierid' => $keys[2], ':categoryid' => $keys[3], ':quantityperunit' => $keys[4], ':unitprice' => $keys[5], ':totalvalue' => $keys[6], ':unitsinstock' => $keys[7], ':unitsonorder' => $keys[8], ':reorderlevel' => $keys[9], ':discontinued' => $keys[10], ':key' => $keys[0]));
			var_dump($statement);

		}catch(PDOException $e){
			$this->conn_error = $e->getMessage();
		}
	}
	public function query_delete($key){
		try{
			//Injection Protection
			$statement = $this->conn_obj->prepare("DELETE FROM products WHERE productid =:key");
			$statement->bindParam(":key", $key);
			$statement->execute();
		}catch(PDOException $e){
			$this->conn_error = $e->getMessage();
		}
	}
	public function query_insert($keys){
		try{
			//Injection Protection
			$sql = "INSERT INTO products VALUES(:productid, :productname, :categoryid, :supplierid, :quantityperunit, :unitprice, :totalvalue, :unitsinstock, :unitsonorder, :reorderlevel, :discontinued)";

			$statement = $this->conn_obj->prepare($sql);
			$statement->execute(array(':productid' => $keys[0], ':productname' => $keys[1], ':categoryid' => $keys[2], ':supplierid' => $keys[3], ':quantityperunit' => $keys[4], ':unitprice' => $keys[5], ':totalvalue' => $keys[6], ':unitsinstock' => $keys[7], ':unitsonorder' => $keys[8], ':reorderlevel' => $keys[9], ':discontinued' => $keys[10]));
			return true;

		}catch(PDOException $e){
			return false;
		}
	}
}
 ?>