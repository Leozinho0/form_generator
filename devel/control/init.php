<?php
//Base
require_once __DIR__.'/../class/DBConn.class.php';
require_once __DIR__.'/../class/Template.class.php';

session_start();

//Objeto de conexção com o banco
//Aqui entrará um script que irá ler as info do config.php para saber onde tá a base e qual a base instalada (SQLite ou MySQL etc)
$fg_conn = new DBConn(__DIR__."/../etc/database.db", "", "", "", "sqlite");

if(isset($_POST['usuario']) && isset($_POST['senha'])){

	//CRÍTICO - PROTEGER CONTRA INJECTION
	//CRÍTICO - PROTEGER CONTRA INJECTION
	//CRÍTICO - PROTEGER CONTRA INJECTION
	$sql = "SELECT COUNT(*) FROM tb_users WHERE LOGIN ='". $_POST['usuario'] ."' AND PASSWORD ='". $_POST['senha'] ."'";
	$result = $fg_conn->select($sql);
	
	if($result[0][0] >= 1){
		echo "y";
	}else if($result[0][0] <= 0){
		echo "n";
	}else{
		var_dump($result);
	}
	exit;
}

//Objeto de template da tela de login
$tpl = array();
$tpl['path'] = __DIR__.'/../template';
$tpl['name'] = "login.tpl.php";
$tpl['vars']['title'] = "FG - Login";
$tpl['vars']['css'] = 'devel/lib/css/login.css';
$tpl['vars']['js'] = 'devel/lib/js/login.js';

$fg_interface_login = new Template($tpl['path'], $tpl['name'], $tpl['vars']);

if($fg_conn->getConnectionStatus()){
	//Para SQLite:
	$_SESSION['fg'] = array();
	$_SESSION['fg']['conn']['address'] = $fg_conn->getAddress();
	$_SESSION['fg']['conn']['user'] = $fg_conn->getUser();
	$_SESSION['fg']['conn']['password'] = $fg_conn->getPassword();
	$_SESSION['fg']['conn']['sgbd'] = $fg_conn->getSGBD();

	$fg_interface_login->display();
}
?>