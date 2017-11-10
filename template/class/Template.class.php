<?php 

//Template Model Test

class Template{

	private $html_return = "<table class='table table-hover table-striped table-bordered'>";
	private $tableHeader = array();
	private $tableBody = array();

	//IMPLEMENTAÇÃO
	private $tpl_vars = array();
	private $tpl = array();
	//

	function __construct($tpl_path, $tpl_name, $tpl_vars = ""){
		//
		$this->tpl['path'] = $tpl_path;
		$this->tpl['name'] = $tpl_name;
		$this->tpl['tpl'] = $tpl_path.DIRECTORY_SEPARATOR.$tpl_name;
		//$this->tpl_data['table_cols'] = $tpl_data['table_cols'];//Ajeitar isso - Foi só teste
		//$this->tpl_data['table_rows'] = $tpl_data['table_rows'];//Ajeitar isso - Foi só teste
		$this->tpl_vars = $tpl_vars;
		//echo "<pre>";
		//var_dump($this->tpl_vars);
	}

	private function appendHeader($data){
		if(!is_array($data)){
			return false;
		}
		//
		$head = "<thead class='thead-inverse bg-success'><tr><th></th>";
		foreach($data as $k => $v){
			//Check for required field
			if($this->isRequired($v[3])){
				$head .= "<th>" . $v[1] . "<span style='color: red;'> *</span></th>";
			}else{
				$head .= "<th>" . $v[1];
			}
			
		}
		$head .= "</tr></thead>";
		$this->html_return .= $head;
	}

	private function appendBody($data){
		if(!is_array($data)){
			return false;
		}
		//
		//Create body with data configs
		foreach($this->tableHeader as $key => $value){

		}
		//
		$body = "<tbody>";
		foreach($data as $key => $value){
			$body .= "<tr>";
			//Update/Delete Buttons
			$body.= "<td id='update_btns'><a onclick='btn_delete(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-trash'></span></a><a onclick='btn_change(this);' class='btn btn-default btn-sm btn_shown btn_change'><span class='glyphicon glyphicon-pencil'></span></a>";
			$body.= "<a onclick='btn_alterar(this, 0);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-remove'></span></a><a onclick='btn_alterar(this, 1);' class='btn btn-default btn-sm btn_hidden btn_update'><span class='glyphicon glyphicon-ok'></span></a></td>";
			//
			foreach($value as $k => $v){
				//Data
				$body .= "<td><span class='input_hidden'><input value='" . $this->replaceQuote($v) . "' type='" . $this->fieldType($k) . "' class='form-control param_data " . $this->controlClasses($k) ."' onpaste='return false;' ". $this->disablePrimaryKey($k) ."><span class='campo_obrigatorio_warn'>* Campo obrigatório</span></span><span class='row_shown'>" . $this->imageDisplay($k, $v) . "</span></td>";
				//
			}
	
			$body .= "</tr>";
		}

		//New Row Append
		$new_row = "<tr id='new_row' style='display: none;'><td><a onclick='btn_new(0)' class='btn btn-default btn-sm btn_update'><span class='glyphicon glyphicon-remove'></span></a><a onclick='btn_insert();' class='btn btn-default btn-sm btn_update'><span class='glyphicon glyphicon-ok'></span></a></td>";
		for($i = 0; $i < count($data[0]); $i++){
			$new_row .= "<td><span><input type = 'number' class='form-control param_data campo_obrigatorio' onpaste='return false;' onblur='checkaCampoVazio(this);'></span></td>";
		}
		$new_row .= "</tr>";
		$body .= $new_row;
		//
		$body .= "</tbody></table><span style='color: red; font-weight: bold; font-size: 0.8em;'>* Campos Obrigatórios</span>";
		$this->html_return .= $body;
	}
	public function setLabel($data, $label){
		if(count($data) == count($label)){
			if(is_array($data) && is_array($label)){
				foreach($data as $key => $value){
					foreach($this->tableHeader as $k =>$v){
						if($v[1] == $value){
							$this->tableHeader[$k][1] = $label[$key]; 
						}
					}
				}
				return true;
			}else{
				foreach($this->tableHeader as $key => $value){
					if($value[1] == $data){
						$this->tableHeader[$key][1] = $label; 
					}
				}
			}
			
		}else{
			return false;
		}
		
	}
	//
	public function setHeader($data){
		$this->tableHeader = $data;
	}
	//
	public function setBody($data){
		$this->tableBody = $data;
	}
	//
	public function display(){
		$this->appendHeader($this->tableHeader);
		$this->appendBody($this->tableBody);
		return $this->html_return;
	}
	//Internal Functions - Test
	private function replaceQuote($str) {
	    return str_replace("'", "&#39;", $str);
	}
	//
	private function isRequired($col){
		//This function will be later refactored and add more functionalities
		if($col){
			return true;
		}else{
			return false;
		}
	}
	//
	private function fieldType($key){
		$type = $this->tableHeader[$key][2];
		$type = preg_replace( '~\(.*\)~' , "", $type);
		
		switch($type){
			case 'INTEGER':
			{
				return 'number';
				break;
			}
			case 'TEXT':
			{
				return 'text';
				break;
			}
			case 'REAL':
			{
				return 'decimal';
				break;
			}
			case 'BLOB':
			{
				return 'file';
				break;
			}
		}
	}
	private function controlClasses($key){
		$class_return = "";
		//Checks For Required Field $this->tableHeader[$key][3] = null/notnull property
		if($this->tableHeader[$key][3] == 1){
			$class_return = " campo_obrigatorio";
		}
		return $class_return;
	}
	private function disablePrimaryKey($key){
		$disabled = "";
		if($this->tableHeader[$key][5] == 1){
			$disabled = " disabled";
		}
		return $disabled;
	}
	//
	private function imageDisplay($k, $v){
		$html_return = "";
		$type = $this->fieldType($k);
		if($type == "file"){
			$v = substr($v, 4);
			$html_return = "<img src='data:image/png;base64, " .$v . "' />";
			//var_dump($v);
			return $html_return;
		}else{
			return $v;
		}
	}

	//IMPLEMENTAÇÃO
	public function getVars($var_name){
		return $this->tpl_vars[$var_name];
	}
	//
	public function display2(){
		if(file_exists($this->tpl['tpl'])){
			include ($this->tpl['tpl']);
		}else{
			echo "Error ao carregar template!";
		}
	}
	//
}


?>