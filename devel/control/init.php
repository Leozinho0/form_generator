<?php
//Base
require_once __DIR__.'/../class/DBConn.class.php';
require_once __DIR__.'/../class/Template.class.php';

session_start();

//Aqui entrará um script que irá ler as info do config.php para saber onde tá a base e qual a base instalada (SQLite ou MySQL etc)
$fg_conn = new DBConn(__DIR__."/../etc/database.db", "", "", "", "sqlite");

if($fg_conn->getConnectionStatus()){
	$_SESSION['fg'] = array();
	//Jogar para sessão os arquivos comuns de conexão com o banco ex.: getAdress()
}
/*
echo "<pre>";
var_dump($fg_conn);
*/






























/*
$table = "products";

if(isset($_POST['table'])){
	$table = $_POST['table'];
}
//Init Conenction
$conn = new Conn('sqlite', 'teste.db', '', '');

$tpl_vars['form_table_cols'] = $conn->query_select("PRAGMA table_info($table)");
$tpl_vars['form_table_rows'] = $conn->query_select("SELECT * FROM $table LIMIT 10");
$tpl_vars['title'] = $table;
$tpl_vars['form_title'] = $table;
$tpl_vars['js'] = "js/scripts.js";
$tpl_vars['css'] = "css/main.css";
$tpl_vars['form_title'] = $table;
$tpl_vars['form_title'] = $table;
/*
//Template Test
$labes = array();
foreach($columns as $v){
	$labes[] = $v[1];
}

$tpl = new Template();
$tpl->setHeader($columns);
$tpl->setBody($data);
$tpl->setLabel($labes , array('Product ID', 'Description', 'Supplier', 'Category', 'Quantity', 'Unit Price', 'Total Value', 'In Stock', 'On Order', 'Recorder Level', 'Discontinued'));
$html_table = $tpl->display();

$tpl_path = "template".DIRECTORY_SEPARATOR."tpl";
$tpl_name = "login.tpl.php"; //Isso será refatorado pq tá chapado
$tpl_obj = new Template($tpl_path, $tpl_name, $tpl_vars);
$tpl_obj->display();
*/
?>