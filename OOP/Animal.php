<?php
class Animal {

	public function __construct(){
		echo "Object Initialized.....<br/>";
	}

	public function speak(){
		echo "Hello...<br/>";
	}

	public function walk(){
		echo "Walk...<br/>";
	}

	public function __destruct(){

		echo "Object dying.....<br/>";

	}
}
?>