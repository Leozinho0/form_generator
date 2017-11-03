<?php
  class Carrinho {
 
    // adiciona item, remove item e outros métodos do carrinho
    private $itens = array();
 
    public function getTotal() {
 
      $total = 0;
      foreach($this->itens as $item) {
        $total += $item->getValor();
      }
 
      return $total;
    }

    public function addItem($item){
    	$this->itens[] = $item;
    }

    public function teste(){
    	var_dump($this->itens);
    }
 
    
public function getTotalComDesconto(FormaDePagamento $formaPGTO) {
        $total = $this->getTotal();
        $total = $formaPGTO->calcula($total);

 
  return $total;
 
}
 
  }

  class Item{
  	private $nome = "";
  	private $valor = "";

  	function __construct($nome, $valor){
  		$this->nome = $nome;
  		$this->valor = $valor;
  	}

  	public function getValor(){
  		return $this->valor;
  	}
  }
 
class PayPal {
  public function calcula($total) {
    return $total * 0.95;
  }
}
 
class CartaoCredito {
  public function calcula($total) {
    return $total;
  }
}

interface FormaDePagamento {
  public function calcula($total);
}

class DebitoOnline implements FormaDePagamento {
  public function calcula($total) {
    return $total * 0.93;
  }
}

 ?>