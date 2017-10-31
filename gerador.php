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
        body, html{
            height: 100%;
        }
        .default_container{
            margin: 0 auto;
            background-color: lightgray;
            width: 500px;
            margin-top: 200px;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .table_container{
            height: 60px;
            overflow: auto;
        }
        .field_container{
            height: 100px;
            overflow: auto;
        }
        .div_tabela{
            float: left;
            width: 50%;
            border: 1px solid white;
            border-radius: 5px;
        }
        .div_generator{
            text-align: center;
        }
        .fconfig_left_container{
            float: left;
            width: 50%;
            height: 100%;
            overflow: auto;
        }
        .fconfig_right_container{
            padding: 10px;
            border: 1px solid white;
            border-radius: 5px;
        }
        .clearboth{
            clear: both;
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
        <div id="div_table" class="default_container table_container">
        <div class="div_tabela">Tabela</div>
        <div class="">
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
        <div id="div_fields_config" class="default_container field_container">
            <div id="fconfig_left_container" class="fconfig_left_container">
                <div id="fconfig_tree">
                </div>
            </div>
            <div id="fconfig_right_container" class="fconfig_right_container">
                lala
            </div>
        </div>

        <div id="div_generator" class="default_container div_generator" style="display: none;">
            <input type="submit" value="Rodar Aplicação">
        </div>
    </form>
</body>
</html>