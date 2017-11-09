<?php

interface FlyBehavior{
	public function fly();
}

class FlyWithWings implements FlyBehavior{
	public function fly(){
		echo "Flown with wings!\n";
	}
}
class FlyNoWay implements FlyBehavior{
	public function fly(){
		echo "Couldn't fly!";
	}
}


abstract class Duck{
	protected $flyBehavior = "";
	function __construct(){
	}

	public function fly(){
		$this->flyBehavior->fly();
	}
}

class MountainDuck extends Duck{
	function __construct(){	
		$this->flyBehavior = new FlyWithWings();
	}
	public function setFlyBehavior($flyBehavior){
		$this->flyBehavior = $flyBehavior;
	}
}
class PlasticDuck extends Duck{
	function __construct(){	
		$this->flyBehavior = new FlyNoWay();
	}
}

$duck1 = new MountainDuck();
$duck1->fly();
$duck1->setFlyBehavior(new FlyNoWay());
$duck1->fly();

 ?>