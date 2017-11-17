<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Novo Projeto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		div{
			box-sizing: border-box;
		}
		.fg_container_newProject{
			background-color: gray;
			border-radius: 5px;
			padding: 15px;
		}
		.fg_project_name{
			display: inline-block;
			padding: 0 0 10px 0;
		}
		.fg_container_newProject_btn{
			padding: 15px 0;
		}
	</style>
</head>
<body>
	<div class="container fg_container_newProject">
		<span id="fg_project_name" class="fg_project_name">Nome do Projeto: </span>
		<input type="text" name="project_name" class="form-control">
		<div class="fg_container_newProject_btn">
			<button id="btn_myProject_cancel" class="btn btn-default btn_myProject_cancel">Cancelar</button>
			<button id="btn_myProject_cancel" class="btn btn-primary btn_myProject_cancel">Próximo</button>
		</div>
		</div>
</body>
</html>