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
			margin: 0;
			height: 100%;
			box-sizing: border-box;
		}
		.header{
			background-color: red;
			height: 50px;
		}
		.header_toolbar{
			background-color: yellow;
		}
		.body{
			background-color: grey;
			height: calc(100% - 50px - 30px);
		}
		.body_left{
			background-color: lightblue;
			float: left;
			width: 250px;
			height: 100%;
		}
		.body_right{
			background-color: white;
			height: 100%;
		}
		.footer{
			background-color: green;
			height: 30px;
		}
	</style>
</head>
<body>
	<!-- Header -->
	<div id="header" class="header">
		<div id="header_toolbar" class="header_toolbar">
			BARRA DE FERRAMENTAS
		</div>
	</div>
	<!-- Body -->
	<div id="body" class="body">
		<div id="body_left" class="body_left">
			BODY LEFT CONTAINER
		</div>
		<div id="body_right" class="body_right">
			BODY RIGHT CONTAINER
		</div>
	</div>
	<!-- Header -->
	<footer id="footer" class="footer">
		FOOTER
	</footer>
</body>
</html>
