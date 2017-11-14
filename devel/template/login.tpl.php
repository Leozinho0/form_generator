<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body, html{
			//background-image: url(../../img/login_bg.png);
			//background-repeat: no-repeat;
			//background-size: cover;
			width: 100%;
			height: 100%;
		}

		.container_header{
			font-size: 110PX;
			text-align: center;
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
	</style>
	<!-- REMOVE -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="container_header" class="container_header">
		TITULO DA FERRAMENTA
	</div>

	<!-- Body -->
	<div id="container_login" class="container container_login">
		<div id="login_usuario" class="login_usuario">
			<span>Usuário</span>
			<input type="text" id="input_usuario" class="input_usuario">
		<div id="login_senha" class="login_senha">
		</div>
			Senha
			<input type="password" id="input_senha" class="input_usuario">
		</div>
		<div>
			<button onclick="login_validate();">Login</button>
		</div>
	</div>

	<!-- Footer -->
	<footer id="container_footer" class="container_footer">
		RODAPÉ
	</footer>

	<!-- SCRIPTS -->
	<script>
		//login Validation
		function login_validate(){
			var usuario = $('#input_usuario')[0].value;
			var senha = $('#input_senha')[0].value;
			//
			alert(usuario + ' ' + senha);
			$.ajax({
				url: "login_validate_teste.php",
				type: "POST",
				data: "id=1" + "&usuario=" + usuario + "&senha=" + senha,
				success: function(cb){
					//IMPLEMENT LOGIC
					if(cb == 1)
						alert('Logado com sucesso!');
						window.location='iloader.php';
				},
				error: function(cb){

				}
			});
		}
	</script>
</body>
</html>
