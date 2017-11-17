<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->getVars('title'); ?></title>
	<!-- JQuery -->
	<script src="<?php echo $this->getVars('jquery'); ?>"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo $this->getVars('bootstrap'); ?>">
	<script src="<?php echo $this->getVars('bootstrap_js'); ?>"></script>
	<!-- CSS -->
	<?php
		$css = $this->getVars('css');
		if(is_array($css)){
			foreach($css as $k => $v){ 
				?> <link rel="stylesheet" href="<?php echo $v; ?>"> <?php
			}
		}else{
			?> <link rel="stylesheet" href="<?php echo $css; ?>"> <?php
		}
	?>
	<!-- JS -->
	<script src="<?php echo $this->getVars('js'); ?>"></script>
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
		<div id="login_warn_error" class="container alert alert-danger login_warn_error">
			<span>Usuário/Senha incorretos!</span>
		</div>
	</div>
	

	<!-- Footer -->
	<footer id="container_footer" class="container_footer">
		RODAPÉ
	</footer>
</body>
</html>
