<?php /*
<!DOCTYPE html>
 <html lang="en">
	 <head>
	 	<meta charset="UTF-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 	<title><?php echo $this->getVars('title'); ?></title>
	 	<link rel="stylesheet" href="<?php echo $this->getVars('css'); ?>"> <!-- css/main.css -->

	 	<!-- BootsTrap -->
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	 	<!-- Complete jQuery -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<!-- Main JS -->
	 	<script src="<?php echo $this->getVars('js'); ?>"></script> <!--  -->
	 	<style>
	 		.container_login{
	 			background_color: red;
	 		}
	 	</style>

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body{
			background-image: url(../../img/login_bg.png);
			background-repeat: no-repeat;
			background-size: cover;
		}
		.container_login{
			background-color: rgba(173, 216, 230, 0.6);
			width: 400px;
			border-radius: 5px;
			text-align: center;
			padding: 20px;
			margin-top: 250px;
		}
		.container_footer{
			background-color: gray;
			position: fixed;
			height: 35px;
			width: 100%;
			bottom: 0;
		}
		.container_header{
			font-size: 110PX;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container_header" class="container_header">
		TITULO DA FERRAMENTA
	</div>
	<div id="container_login" class="container container_login">
		<div>
			Usuário
		</div>
			<input type="text">
		<div>
			Senha
		</div>
			<input type="password">
		<div>
			<button onclick="window.location='../../iloader.php'">Login</button>
		</div>
	</div>

	<!-- Rodapé -->
	<footer id="container_footer" class="container_footer">
		RODAPÉ
	</footer>
</body>
</html>
