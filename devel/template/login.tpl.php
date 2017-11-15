<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->getVars('title'); ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $this->getVars('css'); ?>">
	<!-- REMOVE -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="container_header" class="container_header">
	</div>

	<!-- Body -->
	<div id="container_body" class="container_body">
		<div id="body_login" class="container body_login">
			<div id="login_usuario" class="login_usuario">
				<span>USUÁRIO</span>
				<input type="text" id="input_usuario" class="input_usuario form-control">
			<div id="login_senha" class="login_senha">
			</div>
				<span>SENHA</span>
				<input type="password" id="input_senha" class="input_usuario form-control">
			</div>
			<div>
				<button class="btn btn-success fg_btn_login" onclick="login_validate();">Login</button>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer id="container_footer" class="container_footer">
		RODAPÉ
	</footer>

	<!-- SCRIPTS -->
	<script src="<?php echo $this->getVars('js'); ?>"></script>
</body>
</html>
