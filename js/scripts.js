$(document).ready(function(){
	$('.campo_obrigatorio').on("blur", function(){checkaCampoVazio(this)});
});

function btn_change(obj){
	var tag_obj = obj.parentNode.parentNode.getElementsByClassName('input_hidden');
	var tag_obj2 = obj.parentNode.parentNode.getElementsByClassName('row_shown');
	var btn_obj_shown = obj.parentNode.parentNode.getElementsByClassName('btn_change');
	var btn_obj_hidden = obj.parentNode.parentNode.getElementsByClassName('btn_update');

	//console.log(obj);
	$(tag_obj).each(function() {
		$(this).removeClass('input_hidden').addClass('input_shown');
	});

	$(tag_obj2).each(function() {
		$(this).removeClass('row_shown').addClass('row_hidden');
	});

	$(btn_obj_hidden).each(function() {
		$(this).removeClass('btn_hidden').addClass('btn_shown');
	});
	$(btn_obj_shown).each(function() {
		$(this).removeClass('btn_shown').addClass('btn_hidden');
	});

	//toggle_icons(obj);
}
function btn_alterar(obj, opt){

	var tag_obj = obj.parentNode.parentNode.getElementsByClassName('input_shown');
	var tag_obj2 = obj.parentNode.parentNode.getElementsByClassName('row_hidden');
	var btn_obj_shown = obj.parentNode.parentNode.getElementsByClassName('btn_update');
	var btn_obj_hidden = obj.parentNode.parentNode.getElementsByClassName('btn_change');

	if(opt === 1){
			var row = obj.parentNode.parentNode.children;
			var arr_update = [];
			var campo_vazio = false;

			$.each(row, function(index, val){
				if(index === 0){
					return;
				}else{
					var value = $(this).find('.param_data').val();
					var obrigatorio = $(this).find('input.campo_obrigatorio').val();
					if(obrigatorio === ''){
						campo_vazio = true;
					}
					arr_update.push(value);
				}
				
			});

			if(!campo_vazio){
				if(confirm('Gravar alterações?')){
					//console.log(arr_update);
					var json_update = JSON.stringify(arr_update);
					//console.log(json_update);

					
					//update
					$.ajax({
						url: "conn_valida.php",
						type: "POST",
						data: "id=3" + "&data=" + json_update,
						success: function(ds){
							console.log(ds);
							location.reload();
						}
					});
				}else{
					return;
				}
			}else{
				alert('Preencha os campos obrigatórios!');
			}
			
		
	}else if(opt === 0){
		$(tag_obj).each(function() {
			//bring values back
			$(this).find('.param_data').each(function(){
				//
				if(this.tagName == 'SELECT'){
					//
				}else if(this.type == 'file'){
					//
				}else{
					this.value = this.defaultValue;
				}

				$(this).css('background-color', '');
				$(this.nextSibling).hide();
			});
			//
			$(this).removeClass('input_shown').addClass('input_hidden');
		});

		$(tag_obj2).each(function() {
			$(this).removeClass('row_hidden').addClass('row_shown');
		});
		$(btn_obj_hidden).each(function() {
			$(this).removeClass('btn_hidden').addClass('btn_shown');
		});
		$(btn_obj_shown).each(function() {
			$(this).removeClass('btn_shown').addClass('btn_hidden');
		});

	}
	//btn_change(obj);
}

function btn_delete(obj){
	if(confirm("Apagar?")){
		var key = $(obj.parentNode.parentNode.children[1]).find('input')[0].value;

		//delete
		$.ajax({
			url: "conn_valida.php",
			type: "POST",
			data: "id=4" + "&data=" + key,
			success: function(ds){
				location.reload();
			}
		});
	}else{
		//
	}
}
//
function btn_new(opt){
	if(opt === 1){
		$('#new_row').find('input').each(function(){this.value = ""; 
		$(this).css('background-color', '');});
		$('#new_row').show();
	}else if(opt === 0){
		$('#new_row').find('.campo_obrigatorio_warn').hide();
		$('#new_row').hide();
	}
}
//
function btn_insert(obj){
	var campo_vazio = false;

	$.each($('#new_row').find('input.campo_obrigatorio'), function(index, val){
		if(val.value == ''){
			campo_vazio = true;
		}
	});


	var arr_update = [];
	$.each($('#new_row').find('.param_data'), function(index, val){
		arr_update.push(val.value);
	});

	if(!campo_vazio){
		if(confirm("Inserir registros?")){
			//Insert
			var json_insert = JSON.stringify(arr_update);
			$.ajax({
				url: "conn_valida.php",
				type: "POST",
				data: "id=5" + "&data=" + json_insert,
				success: function(ds){
					//console.log(ds);
					//$('#new_row').before(ds);
					if(ds == "n"){
						alert("Violação de chave primária");
					}else if(ds == "y"){
						$('#new_row').hide();
						location.reload();
					}
					//console.log(ds);
				}
			});
		}else{
			console.log(arr_update);
		}
	}else{
		$('#new_row').find('input.campo_obrigatorio').blur();
		alert('Preencha os campos obrigatórios!');
		console.log(obj);
	}
	
}
//


function field_autoComplete(field_class){
	$(function(){
		var availableTags = [];
		$.ajax({
			url: "conn_valida.php",
			type: "POST",
			data: "id=2" + "&data=" + field_class,
			success: function(ds){
				//console.log(field_class);
				ds = JSON.parse(ds);
				for(var i = 0; i < ds.length; i++){
					availableTags.push(ds[i][0]);
				}
				//console.log(availableTags);
			}
		});
		$('.' + field_class).autocomplete({
			source: availableTags,
			select: function( event , ui ) {
            	//console.log(ui.item.label );
        	}
		});
	});
}
function checkaCampoVazio(obj){
	if(obj.value == ""){
		$(obj).css('background-color', '#e4b9b9');
		$(obj.nextSibling).show();
	}else{
		$(obj).css('background-color', '');
		$(obj.nextSibling).hide();
	}
}

function checkaLookup(obj, campo){
	var id = "";
	if(campo == 1){
		id = 6;
	}else if(campo == 2){
		id = 7;
	}
	
	$.ajax({
			url: "conn_valida.php",
			type: "POST",
			data: "id=" + id + "&data=" + obj.value,
			success: function(ds){
				if(ds === "y"){
					$(obj).css('background-color', '');
					$(obj.nextSibling).hide();
				}else{
					$(obj).css('background-color', '#fcf8e3');
					$(obj.nextSibling).show();
					$(obj).val("");
				}
			}
		});
}