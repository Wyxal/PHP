<?php
session_start();
$dealer = array();
$player = array();
$deck   = array();
$cards  = array("A","2","3","4","5","6","7","8","9","10","J","Q","K");
$types  = array("D","H","S","C");

function Game()
{
$this->createDeck();

	for ($t = 0; $t <= 3; $t++)
	{
	shuffle($this->DECK);
	}
}

function createDeck()
{
	for ($i = 0; $i < 13; $i++)
	{
		for($x = 0; $x < 4; $x++)
		{
		array_push($this->DECK,$this->cards[$i].$this->suits[$x]);
		}
	}
}
			
?>

