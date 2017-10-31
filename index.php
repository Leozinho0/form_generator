<?php
require_once 'class/conn.class.php';
require_once 'template/class/Template.class.php';
$table = "products";

if(isset($_POST['table'])){
	$table = $_POST['table'];
}

//Init Conenction
$conn = new Conn('sqlite', 'teste.db', '', '');

$columns = $conn->query_select("PRAGMA table_info($table)");
$data = $conn->query_select("SELECT * FROM $table LIMIT 10");

//Template Test
$labes = array();
foreach($columns as $v){
	$labes[] = $v[1];
}

$tpl = new Template();
$tpl->setHeader($columns);
$tpl->setBody($data);
$tpl->setLabel($labes , array('Product ID', 'Description', 'Supplier', 'Category', 'Quantity', 'Unit Price', 'Total Value', 'In Stock', 'On Order', 'Recorder Level', 'Discontinued'));
$html_table = $tpl->display();

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<title>Home</title>
 	<link rel="stylesheet" href="css/main.css">

 	<!-- BootsTrap -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 	<!-- Complete jQuery -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- Main JS -->
 	<script src="js/scripts.js"></script>
 </head>
 <body>
 	<div class="container-fluid " id="form">
 		<div class="form_header container-fluid bg-success text-center" style="margin-bottom: 15px;" id="form_header">
 			<h1>Tabela Products</h1>
 		</div>
 		<div class="form_body" id="form_body">
 			<?php echo $html_table; ?>
 		</div>
 		<div class="form_toolbar container-fluid bg-success text-center" style="margin-top: 15px;">
 			<a href="" class="btn bg-primary">Sair</a>
 			<a href="javascript: btn_new(1);" class="btn bg-primary">Novo</a>
 		</div>
 	</div>
 </body>
 </html>