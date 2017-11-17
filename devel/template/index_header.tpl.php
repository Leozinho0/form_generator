<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $this->getVars('title'); ?></title>
   <!-- JQuery -->
   <script src="<?php echo $this->getVars('jquery'); ?>"></script>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="<?php echo $this->getVars('bootstrap'); ?>">
   <script src="<?php echo $this->getVars('bootstrap_js'); ?>"></script>
   <!-- CSS -->
   <?php
      $css = $this->getVars('css');
      if(is_array($css)){
         foreach($css as $k => $v){ 
            ?> <link rel="stylesheet" href="<?php echo $v; ?>"> <?php
         }
      }else{
         ?> <link rel="stylesheet" href="<?php echo $css; ?>"> <?php
      }
   ?>
   <!-- JS -->
   <script src="<?php echo $this->getVars('js'); ?>"></script>
</head>
<body>
   <!-- Header -->
   <div id="header" class="header">
      <div id="header_toolbar" class="header_toolbar">
         <nav id="nav_header_toolbar" class="navbar navbar-inverse nav_header_toolbar">
            <div class="container-fluid">
               <div class="navbar-header"> <a class="navbar-brand" href="#">FG</a> </div>
               <ul class="nav navbar-nav">
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Projeto <span class="caret"></span></a> 
                     <ul class="dropdown-menu">
                        <li><a href="#" onclick="fg_navigate('', 'body'); return false;">Novo Projeto</a></li>
                        <li><a href="#">Abrir Projeto</a></li>
                        <li><a href="#">Fechar Projeto</a></li>
                        <li><a href="#">Importar Projeto</a></li>
                        <li><a href="#">Exportar Projeto</a></li>
                        <li><a href="#">Publicar</a></li>
                        <li><a href="#">Propriedades</a></li>
                     </ul>
                  </li>
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Editar <span class="caret"></span></a> 
                     <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                     </ul>
                  </li>
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ferramentas <span class="caret"></span></a> 
                     <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                     </ul>
                  </li>
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configurações <span class="caret"></span></a> 
                     <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                     </ul>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
               </ul>
            </div>
         </nav>
         <!--Nav toolbar 2 --> 
         <nav id="nav_header_toolbar_2" class="navbar navbar-default nav_header_toolbar_2">
            <div class="container-fluid">
               <ul class="nav navbar-nav navbar-left">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
               </ul>
            </div>
         </nav>
      </div>
   </div>