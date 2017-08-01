<?php
class Person {

	//Define Properties
	public $race = "Chinese";
	protected $age = "18";

	//public, private, protected

	private $firstname = "Jason";
	public $lastname = "Lee";
	public $feeling = "Happy";

	public $friend = NULL;

	//Define Methods
	public function walk(){
		echo $this->firstname." I'm walking...<br/>";
	}

	public function shout(){
		echo "Aaaaaaaa........<br/>";
	}

	public function jump(){
		echo "Jumping! Jumping! <br/>";
	}

	//Type Hinting
	public function makeFriend(Person $friend){

		$this->friend = $friend;

		echo $this->friend->firstname." AND ".$this->firstname." becoming friend =)<br/>";

	}

}
?>