<?php
require_once __DIR__.'/../class/Template.class.php';

##TESTE CARREGAMENTO NOVAS PAGINAS

if(isset($_GET['leo'])){



	$tpl = array();
	$tpl['path'] = __DIR__.'/../template';
	$tpl['name'] = "teste_novo_projeto.tpl.php";
	$tela_novo_projeto_TESTE = new Template($tpl['path'], $tpl['name']);
	$tela_novo_projeto_TESTE->display();
	exit;

	##FUNCIONANDO!
}



##END TEST

//Objeto de template da tela de index
$tpl = array();
$tpl['path'] = '../template/';
$tpl['name'] = "index_header.tpl.php";
$tpl['vars']['title'] = "FG - Home";
$tpl['vars']['css'] = "FG - Login";
$fg_interface_index_header = new Template($tpl['path'], $tpl['name']);
$fg_interface_index_header->display();

$tpl = array();
$tpl['path'] = "../template/";
$tpl['name'] = "index_body.tpl.php";
$fg_interface_index_body = new Template($tpl['path'], $tpl['name']);
$fg_interface_index_body->display();

?>