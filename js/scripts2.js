function load_menu(key, table){
	switch(key){
		case 1:
		{
			$.ajax({
				type: "POST",
				url: "generator_ajax_response.php",
				data: "id=" + key + "&table=" + table,
				success: function(ds){
					//Fields Tree
					var arr_fields_tree = JSON.parse(ds);

					$('#fconfig_tree').jstree({ 'core' : {
					    'data' : arr_fields_tree
					} });

					$('#div_fields_config').show();
					$('#div_generator').show();
				}
			});
			break;
		}
	}
}