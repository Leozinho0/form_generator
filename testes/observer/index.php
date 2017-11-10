<?php 


require_once "class.php";

$group = new Group();

$group_participants = array();
$group_participants[] = new GroupMember($group);
$group_participants[0]->setMemberName("Leandro");

$group_participants[] = new GroupMember($group);
$group_participants[1]->setMemberName("Robot");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat Test</title>
	<style>
		div{
			box-sizing: border-box;	
		}
		.chat_container{
			background-color: gray;
			height: 500px;
			padding: 10px;
			border: 2px solid purple;
		}
		.chat_window{
			background-color: white;
			height: 100%;
			width: 	80%;
			overflow-y: auto;
			float: 	left;
		}
		.chat_group_participants{
			float: 	left;
			width: 	20%;
			background-color: 	green;
			height: 	100%;
		}
		.keyboard_container{
			background-color: gray;
			height: 120px;
			padding: 10px;
			border: 2px solid purple;
		}
		.keyboard_writearea{
			background-color: white;
			width: 	80%;
		}
		textarea{
			resize: none;
			width: 	90%;
			height: 90px;
		}
	</style>
</head>
<body>
	<div class="chat_container" id="chat_window">
		<div class="chat_window" id="chat_window">
			lala
		</div>
		<div class="chat_group_participants" id="chat_group_participants">
		<?php foreach($group_participants as $v){ echo $v->getMemberName() . "<br>"; } ?>
		</div>
	</div>
	<div class="keyboard_container" id="keyboard_container">
		<div class="keyboard_writearea" id="keyboard_writearea">
			<form action="">
				<textarea name="" id="" cols="30" rows="10">LALA</textarea>
				<button>Enviar</button>
			</form>
		</div>
	</div>
</body>
</html>