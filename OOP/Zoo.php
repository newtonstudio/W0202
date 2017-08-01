<?php
class Zoo {

	private $queue = array();	

	public function animalIn(Animal $animal){
		$this->queue[] = $animal;
	}

	public function performanceStart(){
		foreach($this->queue as $v) {
			$v->walk();
		}
	}

}
?>