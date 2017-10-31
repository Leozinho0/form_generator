<?php 
require_once 'conn.class.php';

//Set Conenction
$conn = new Conn('sqlite', 'teste.db', '', '');

if(isset($_POST['id']) && $_POST['id'] == 2){ //AutoComplete

	if($_POST['data'] === 'supplierid' || $_POST['data'] === 'supplierid_new'){
		$result = $conn->query_select('SELECT companyname FROM suppliers');
	}else if($_POST['data'] === 'categoryid' || $_POST['data'] === 'categoryid_new'){
		$result = $conn->query_select('SELECT categoryname FROM categories');
	}
	echo json_encode($result);
	//echo $_POST['data'];

}else if(isset($_POST['id']) && $_POST['id'] == 3){ //Update Rows

	$data = json_decode($_POST['data']);
	$data[2] = str_replace("'", "''", $data[2]);
	$data[3] = str_replace("'", "''", $data[3]);

	//AutoComplete Lookup
	$sql = "SELECT supplierid FROM suppliers WHERE companyname = '" . $data[2] . "'";
	$result = $conn->query_select($sql);
	$data[2] = $result[0][0];

	$sql = "SELECT categoryid FROM categories WHERE categoryname = '" . $data[3] . "'";
	$result = $conn->query_select($sql);
	$data[3] = $result[0][0];

	

	$conn->query_update($data);
	var_dump($sql);

}else if(isset($_POST['id']) && $_POST['id'] == 4){ //Delete Rows

	$key = $_POST['data'];
	$conn->query_delete($key);
}else if(isset($_POST['id']) && $_POST['id'] == 5){ //Insert New Rows

	$data = json_decode($_POST['data']);

	//AJAX Refresh - Retorno The HTML
	/*
	for($i = 0; $i < 12; $i++){
		$html = "<tr>"; $html = $html . "<td id='update_btns'>" . "<a onclick='btn_delete(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-trash'></span></a>"; $html = $html . "<a onclick='btn_change(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-pencil'></span></a>" ; $html = $html . "<a onclick='btn_alterar(this, 0);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-remove'></span></a>"; $html = $html . "<a onclick='btn_alterar(this, 1);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-ok'></span></a>" . "</td>"; $html = $html . "<a onclick='btn_alterar(this);' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></a>" . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[0] . "' class='form-control' disabled></span>" . "<span class='row_shown'>" . $data[0] . "</span>" . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[1] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[1] . "</span>" . "</td>"; $html = $html . "<td><span class='input_hidden'><input id='supplierid' value='" . $data[2] . "' class='form-control' list='languages' onkeyup=field_autoComplete(this);></span>" . "<span class='row_shown'>" . $data[2] . "</td>"; $html = $html . "<td><span class='input_hidden'><input id='categoryid' value='" . $data[3] . "' class='form-control' list='' onkeyup=field_autoComplete(this);></span>" . "<span class='row_shown'>" . $data[3] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[4] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[4] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[5] ."' class='form-control'></span>" . "<span class='row_shown'>" . $data[5]  . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[6] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[6] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[7] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[7] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[8] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[8] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[9] . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[9] . "</td>"; $html = $html . "<td><span class='input_hidden'><input value='" . $data[10]  . "' class='form-control'></span>" . "<span class='row_shown'>" . $data[10] . "</td>"; $html = $html . "</tr>"; 
	}*/

	//AutoComplete Lookup

	$data[2] = str_replace("'", "''", $data[2]);
	$data[3] = str_replace("'", "''", $data[3]);

	$sql_id = "SELECT COUNT(*) FROM products WHERE productid = " . $data[0];
	$result0 = $conn->query_select($sql_id);
	if($result0[0][0] >= 1){
		echo "n";
	}else{
		$sql = "SELECT supplierid FROM suppliers WHERE companyname = '" . $data[2] . "'";
		$result = $conn->query_select($sql);
		$data[2] = $result[0][0];

		$sql = "SELECT categoryid FROM categories WHERE categoryname = '" . $data[3] . "'";
		$result = $conn->query_select($sql);
		$data[3] = $result[0][0];

		$conn->query_insert($data);
		echo "y";
	}

	//echo $html;
}else if(isset($_POST['id']) && ($_POST['id'] == 6 || $_POST['id'] == 7)){
	$data = $_POST['data'];
	$data = str_replace("'", "''", $data);

	if($_POST['id'] == 6){
		$sql = "SELECT supplierid FROM suppliers WHERE companyname = '" . $data . "'";
		$result = $conn->query_select($sql);
		$data = $result[0][0];
	}else if($_POST['id'] == 7){
		$sql = "SELECT categoryid FROM categories WHERE categoryname = '" . $data . "'";
		$result = $conn->query_select($sql);
		$data = $result[0][0];
	}

	if(!empty($data)){
		echo "y";
	}else{
		echo "n";
	} 
}

?>