<?php 
//Start Load
require_once 'class/conn.class.php';

//Set Conenction
$conn = new Conn('sqlite', 'teste.db', '', '');
$result = $conn->query_select("SELECT name FROM sqlite_master WHERE type = 'table'");
//echo "<pre>";
//var_dump($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generator</title>
    <style>
        .default_container{
            margin: 0 auto;
            background-color: lightgray;
            width: 500px;
            margin-top: 200px;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .div_tabela{
            //float: left;
            width: 49%;
            border: 1px solid white;
            border-radius: 5px;
        }
        .div_generator{
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- JSTREE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="js/scripts2.js"></script>
</head>
<body>
    <form action="index.php" method="POST">
        <div id="div_table" class="default_container">
        <div class="div_tabela">Tabela</div>
        <div class="div_tabela">
            <select name="table" id="" onchange="load_menu(1, this.value);";>
                <?php
                $option = "";
                foreach($result as $key => $value){
                    $option .= "<option value='" . $value[0]."'>". $value[0] ."</option>";
                }
                echo $option;
                ?>
            </select>
        </div>
        </div>
        <div id="div_fields_config" class="default_container">
            <div id="fields_config_tree">
                lala
            </div>
            <div id="fields_config_settings">
                lala
            </div>
        </div>

        <div id="div_generator" class="default_container div_generator" style="display: none;">
            <input type="submit" value="Rodar Aplicação">
        </div>
    </form>
</body>
</html>