function fg_navigate(obj, location){
	$.ajax({
		url: "",
		type: "GET",
		data: "leo=1",
		success: function(cb){
			$("#" + location).html(cb);
		},
		error: function(cb){
			alert(cb);
		}
	});
}