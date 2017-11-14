<?php
//Login Validation
if((isset($_POST['usuario']) && isset($_POST['senha'])) && isset($_POST['id']) && $_POST['id'] === 1){
	//Test Injection
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
}
?>