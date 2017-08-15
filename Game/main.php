<?php

function __autoload($className) {
	include ucfirst($className).".php";
}

/*
include "Animal.php";
include "Rabbit.php";
include "Tortoise.php";
include "Cat.php";
include "Game.php";
*/

$rabbit = new Rabbit();
$tortoise = new Tortoise();
$cat = new Cat();

$game = new Game();

$game->welcome($rabbit);
$game->welcome($tortoise);
$game->welcome($cat);

$game->racingStart();



?>