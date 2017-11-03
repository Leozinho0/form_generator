<?php 
include_once "Carrinho.class.php";

$item1 = new Item("Camisa", 30);
$item2 = new Item("Calça", 100);


$carrinho = new Carrinho();
$carrinho->addItem($item1);
$carrinho->addItem($item2);

$debito = new DebitoOnline();

echo $carrinho->getTotalComDesconto(new DebitoOnline());

 ?>