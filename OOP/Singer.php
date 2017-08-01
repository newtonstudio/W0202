<?php
//inheritance
class Singer extends Person {
	public function shout(){
		echo "My Age is ".$this->age.' Firstname is'.$this->firstname;
	}
}
?>