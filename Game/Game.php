<?php
class Game {

	public $players = array();

	public function welcome(Animal $player) {
		$player->report();
		$this->players[] = $player;
	}

	public function racingStart(){

		//Preparing
		foreach($this->players as $v){
			$v->run();
		}

		//Comparing
		$ChampionSpeed = 0;
		$Champion = "";

		foreach($this->players as $v) {
			if($v->getSpeed() > $ChampionSpeed) {
				$ChampionSpeed = $v->getSpeed();
				$Champion = $v->getName();
			}
		}

		echo "<h1>The Champion is ".$Champion.", speed: ".$ChampionSpeed."</h1>";

		echo '<table width="100%" border="1">';
		echo '<tr><th>Player</th><th>Speed</th></tr>';
		foreach($this->players as $v) {
			echo '<tr><td>'.$v->getName().'</td><td>'.$v->getSpeed().'</td></tr>';
		}
		echo '</table>';


	}

}
?>