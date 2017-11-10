<?php

//load temlate controler
require_once 'template/class/Template.class.php';
//load internal db conn
require_once 'devel/class/fgconn.class.php';
require_once 'class/conn.class.php';


//IMPLEMENTAÇÃO
//Montagem da tela inicial com Template

$conn = new Conn('sqlite', 'teste.db', '', '');

$tpl_vars['form_table_cols'] = $conn->query_select("PRAGMA table_info($table)");
$tpl_vars['form_table_rows'] = $conn->query_select("SELECT * FROM $table LIMIT 10");
$tpl_vars['title'] = $table;
$tpl_vars['form_title'] = $table;
$tpl_vars['js'] = "js/scripts.js";
$tpl_vars['css'] = "css/main.css";
$tpl_vars['form_title'] = $table;
$tpl_vars['form_title'] = $table;


$tpl_path = "template".DIRECTORY_SEPARATOR."tpl";
$tpl_name = "grid_edit_view.tpl.php";
$tpl_obj = new Template($tpl_path, $tpl_name, $tpl_vars);
$tpl_obj->display();

//

?>