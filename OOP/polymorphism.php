<?php
include "Animal.php";
include "Tiger.php";
include "Bird.php";
include "Dog.php";
include "Zoo.php";

$zoo = new Zoo();


$tiger = new Tiger();
$bird  = new Bird();
$dog   = new Dog();

unset($dog);

//$zoo->animalIn($dog);
$zoo->animalIn($tiger);
$zoo->animalIn($bird);

$zoo->performanceStart();




?>