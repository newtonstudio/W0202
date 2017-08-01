<?php

include "Person.php";

$human1 = new Person();
$human1->walk();

$human2 = new Person();
//$human2->firstname = "Alice";

echo $human2->age;

$human1->makeFriend($human2);


?>
<h1>What is human1 name ?</h1>
<h2>Ans: <?=$human1->firstname.' '.$human1->lastname?></h2>

<?php
$human1->firstname = "Michael";
$human1->lastname = "Tan";

?>
<h1>What is human1 name ?</h1>
<h2>Ans: <?=$human1->firstname.' '.$human1->lastname?></h2>