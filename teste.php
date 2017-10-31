<?php 
$str ="ABC (Test1)";    
echo preg_replace( '~\(.*\)~' , "", $str );  
 ?>