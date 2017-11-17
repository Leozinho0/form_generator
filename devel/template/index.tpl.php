<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->getVars('title');?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $this->getVars('css'); ?>">
	<!-- REMOVE -->
	<script src="<?php echo $this->getVars('jquery');?>"></script>
	<script src="<?php echo $this->getVars('bootstrap');?>"></script>
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
		<!--
		<div id="body_sidebar" class="body_sidebar">
			BODY LEFT CONTAINER
		</div>
		<div id="body_Content" class="body_Content">
			BODY RIGHT CONTAINER
		</div>
		-->
		
	</div>
	<!-- Header -->
	<footer id="footer" class="footer">
		FOOTER
	</footer>
	<!-- SCRIPTS -->
	<script src="<?php echo $this->getVars('js'); ?>"></script>
</body>
</html>
