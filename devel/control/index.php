<?php
require_once __DIR__.'/../class/Template.class.php';

//Objeto de template da tela de index
$tpl = array();
$tpl['path'] = __DIR__.'/../template';
$tpl['name'] = "index.tpl.php";
$tpl['vars']['title'] = "FG - Home";
$tpl['vars']['css'] = "../lib/css/index.css";
$tpl['vars']['js'] = "../lib/js/index.js";
$tpl['vars']['jquery'] = "../lib/js/jquery.js";
$tpl['vars']['bootstrap'] = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";

$fg_interface_index = new Template($tpl['path'], $tpl['name'], $tpl['vars']);
$fg_interface_index->display();

//Objeto de template da tela de index
$tpl = array();
$tpl['path'] = __DIR__.'/../template';
$tpl['name'] = "index_header_toolbar.tpl.php";
$fg_interface_index_header_toolbar = new Template($tpl['path'], $tpl['name']);

?>
<script>
	$(document).ready(function(){
		var header_toolbar_html = ' <?php $fg_interface_index_header_toolbar->display(); ?> ';
		$('#header_toolbar').html(header_toolbar_html);
		console.log(header_toolbar_html);
	});
</script>