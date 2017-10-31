function load_menu(key, table){
	switch(key){
		case 1:
		{
			$.ajax({
				type: "POST",
				url: "generator_ajax_response.php",
				data: "id=" + key + "&table=" + table,
				success: function(ds){
					$('#div_fields_config').html(ds);
					$('#div_fields_config').show();
					$('#div_generator').show();
				}
			});
			break;
		}
	}
}