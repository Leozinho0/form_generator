<?php 
require_once 'class/conn.class.php';
$conn = new Conn('sqlite', 'teste.db', '', '');

if(isset($_POST['id']) && $_POST['id'] == 1){
	$table = $_POST['table'];
	$columns = $conn->query_select("PRAGMA table_info($table)");
	if(!empty($columns)){
		$arr_retorno = array();
		foreach($columns as $key => $value){
			$arr_retorno[] = array('text' => $value[1]);
		}
		echo json_encode($arr_retorno);
	}
	exit;
}
/*
[
					       'Campos',
					       {
					         'text' : 'Root node 2',
					         'state' : {
					           'opened' : true,
					           'selected' : true
					         },
					         'children' : [
					           { 'text' : 'Child 1' },
					           'Child 2'
					         ]
					      }
					    ]
					    */
?>


						