<?php 
include_once "Carrinho.class.php";

$item1 = ItemFactory::create('calça', 100);


$carrinho = new Carrinho();
$carrinho->addItem($item1);

$debito = new DebitoOnline();

echo $carrinho->getTotalComDesconto(new DebitoOnline());

 ?>