//login Validation
function login_validate(){
	var usuario = $('#input_usuario')[0].value;
	var senha = $('#input_senha')[0].value;
	$.ajax({
		url: "",
		type: "POST",
		data: "usuario=" + usuario + "&senha=" + senha,
		success: function(cb){
			if(cb == "y"){
				window.location='devel/control/index.php';
			}else if(cb == "n"){
				alert("Usuário e/ou senha incorreto(s)!");
			}else{
				console.log(cb);
			}
		},
		error: function(cb){

		}
	});
}