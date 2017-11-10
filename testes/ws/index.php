<?php 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>ws test</title>
 </head>
 <body>
 	<script>
 		var socket = new WebSocket("wss://echo.websocket.org");
 		socket.onopen = function(){
 			alert('Socket connected successfully!');
 			socket.send('teste');
 		}
 	</script>
 </body>
 </html>