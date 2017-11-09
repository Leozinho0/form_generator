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
	function __construct($flyBehavior){
		$this->flyBehavior = $flyBehavior;
	}
	public function fly(){
		$this->flyBehavior->fly();
	}
	public function setFlyBehavior($flyBehavior){
		$this->flyBehavior = $flyBehavior;
	}
}

class MountainDuck extends Duck{

}
class PlasticDuck extends Duck{

}

$duck1 = new MountainDuck();
$duck1->fly();
$duck1->setFlyBehavior(new FlyNoWay());
$duck1->fly();

 ?>