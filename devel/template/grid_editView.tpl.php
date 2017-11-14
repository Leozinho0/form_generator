<?php
 ?>
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
 	<script src="<?php echo $this->getVars('js'); ?>"></script> <!-- js/scripts.js -->
 </head>
 <body>
 	<div class="container-fluid " id="form">
 		<div class="form_header container-fluid bg-success text-center" style="margin-bottom: 15px;" id="form_header">
 			<h1><?php echo $this->getVars('form_title'); ?></h1> <!-- Tabela Products -->
 		</div>
 		<div class="form_body" id="form_body">
 			<!-- IMPLEMENTAÇÃO -->
 			<table class='table table-hover table-striped table-bordered'>
 				<thead class='thead-inverse bg-success'><tr><th></th>
 				<?php
				foreach($this->getVars('form_table_cols') as $k => $v){
					//Check for required field
					/*
					if($this->isRequired($v[3])){
						echo "<th>" . $v[1] . "<span style='color: red;'> *</span></th>";
					}else{
						echo "<th>" . $v[1] . "</tr></thead>";
					}*/
					echo "<th>" . $v[1] . "<span style='color: red;'> *</span></th>";
				}
				echo "</tr></thead>";
				//Create body with data configs
				//foreach($this->getVars('form_table_body') as $key => $value){
				echo "<tbody>";
				foreach($this->getVars('form_table_rows') as $key => $value){
					echo "<tr>";
					//Update/Delete Buttons
					echo "<td id='update_btns'><a onclick='btn_delete(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-trash'></span></a><a onclick='btn_change(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-pencil'></span></a>";
					echo "<a onclick='btn_alterar(this, 0);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-remove'></span></a><a onclick='btn_alterar(this, 1);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-ok'></span></a></td>";
					//
					foreach($value as $k => $v){
						//Data
						echo "<td><span class='input_hidden'><input value='" . $this->replaceQuote($v) . "' type='" . @$this->fieldType($k) . "' class='form-control param_data " . @$this->controlClasses($k) ."' onpaste='return false;' ". @$this->disablePrimaryKey($k) ."><span class='campo_obrigatorio_warn'>* Campo obrigatório</span></span><span class='row_shown'>" . @$this->imageDisplay($k, $v) . "</span></td>";
						//
					}
			
					echo "</tr>";
				}
				//New Row Append
				echo "<tr id='new_row' style='display: none;'><td><a onclick='btn_new(0)' class='btn btn-default btn-sm btn_update'><span class='glyphicon glyphicon-remove'></span></a><a onclick='btn_insert();' class='btn btn-default btn-sm btn_update'><span class='glyphicon glyphicon-ok'></span></a></td>";
				for($i = 0; $i < count($this->getVars('form_table_rows')); $i++){
					echo "<td><span><input type = 'number' class='form-control param_data campo_obrigatorio' onpaste='return false;' onblur='checkaCampoVazio(this);'></span></td>";
				}
				echo "</tr>";
				//
				echo "</tbody></table><span style='color: red; font-weight: bold; font-size: 0.8em;'>* Campos Obrigatórios</span>";
				?>
	<!-- IMPLEMENTAÇÃO -->
 		</div>
 		<div class="form_toolbar container-fluid bg-success text-center" style="margin-top: 15px;">
 			<a href="" class="btn bg-primary">Sair</a>
 			<a href="javascript: btn_new(1);" class="btn bg-primary">Novo</a>
 		</div>
 	</div>
 </body>
 </html>