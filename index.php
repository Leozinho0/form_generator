<?php
require_once 'class/conn.class.php';
require_once 'template/class/Template.class.php';

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
*/
$tpl_path = "template".DIRECTORY_SEPARATOR."tpl";
$tpl_name = "grid_edit_view.tpl.php"; //Isso será refatorado pq tá chapado
$tpl_obj = new Template($tpl_path, $tpl_name, $tpl_vars);
$tpl_obj->display2();
?>