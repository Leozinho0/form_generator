<?php 
require_once 'class/conn.class.php';
$conn = new Conn('sqlite', 'teste.db', '', '');

if(isset($_POST['id']) && $_POST['id'] == 1){
	$table = $_POST['table'];
	$columns = $conn->query_select("PRAGMA table_info($table)");
	if(!empty($columns)){
		echo json_encode($columns);
	}
	exit;
}

?>