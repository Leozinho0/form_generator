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
			overflow: auto;
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
		.body_sidebar{
			background-color: lightblue;
			float: left;
			width: 250px;
			height: 100%;
			overflow: auto;
		}
		.body_Content{
			background-color: white;
			height: 100%;
			overflow: auto;
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
		<div id="body_sidebar" class="body_sidebar">
			BODY LEFT CONTAINER
		</div>
		<div id="body_Content" class="body_Content">
			BODY RIGHT CONTAINER
		</div>
	</div>
	<!-- Header -->
	<footer id="footer" class="footer">
		FOOTER
	</footer>
</body>
</html>
