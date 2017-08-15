<?php

Interface Ihero {
	public function fly();
	public function wearFitCloth();
	public function walk();
}

Interface IMalaysia {
	public function lah();
	public function limteh();
}

class kacangMan implements Ihero, IMalaysia {
	public function fly(){
		echo "(Kacang Fly....)<br/>";
	}
	public function wearFitCloth(){
		echo "(the color of kacang...)<br/>";
	}
	public function walk(){
		echo "(kacang littering over the floor...)<br/>";
	}
	public function lah(){
		echo "kacangMan says lah<br/>";
	}
	public function limteh(){
		echo "kacangMan go to mamak stall limteh<br/>";
	}
} 

$kacangMan = new kacangMan();
$kacangMan->fly();
$kacangMan->wearFitCloth();
$kacangMan->walk();
$kacangMan->lah();
$kacangMan->limteh();





?>