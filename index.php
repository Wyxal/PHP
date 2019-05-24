<?PHP
class Game
{
	public $DECK = array();
	public $DEALER = array();
	public $PLAYER = array();
	public $cards = array("A","2","3","4","5","6","7","8","9","10","J","Q","K");
	public $suits = array("D","H","S","C");
	
	public function Game()
	{
		$this->createDeck();
		for ($t = 0; $t <= 3; $t++)
		{
			shuffle($this->DECK);
		}
	}
	
	private function createDeck()
	{
		for ($i = 0; $i < 13; $i++)
		{
			for($x = 0; $x < 4; $x++)
			{
		array_push($this->DECK,$this->cards[$i].$this->suits[$x]);
			}
		}
	}
	public function dealDealer()
	{
		return array_pop($this->DECK).",".array_pop($this->DECK);
	}
	
	public function dealPlayer()
	{
		return array_pop($this->DECK).",".array_pop($this->DECK);
	}
	
	public function dealCard()
	{
		return array_pop($this->DECK);
	}
	
	public function translateCard($card)
	{
		$face = substr($card,0,-1);
		$suit = substr($card,-1,1);
		switch($suit)
		{
			case 'C':
				return $face." of Clubs";
			case 'S':
				return $face." of Spades";
			case 'H':
				return $face." of Hearts";
			case 'D':
				return $face." of Diamonds";
		}
	}
	
	public function getHandValue($cards)
	{
		$value = 0;
		foreach ($cards as &$values)
		{
			$value += $this->getCardValue($values);
		}
		return $value;
	}
	
	public function getCardValue($card)
	{
		$face = substr($card,0,-1);
		$suit = substr($card,-1,1);
		$num_pattern = '/[0-9]/';
		$face_pattern = '/[JQK]/';
		if (preg_match($num_pattern,$face))
		{
			return $face;
		}
		else if (preg_match($face_pattern,$face))
		{
			return 10;
		}
		else
		{
			return 1;
			echo "ACE.";
		}
		echo "Face: ".$face."<br />Suit: ".$suit."<br />";
	}
    public function winCheck($uValue, $dValue, $stand){
        if($uValue > 21){
            echo "<div style='background-color:red; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You Lose, better luck next time :)</div>";
            return 1;
        }
        else if ($dValue > 21){
            echo "<div style='background-color:green; text-align:center; color:;black font-size:30px; font-weight:bold; padding:25px;'>You Win, you are good. </div>";
            return 1;
        }
        else if ($stand == 1){
            if($uValue > $dValue){
               echo "<div style='background-color:green; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You Win, you are good.</div>";
                return 1;
            }
            else{
                echo "<div style='background-color:red; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You Lose, better luck next time :)</div>";
                return 1;
            }
        }
        return 0;
    }
}
$gameOver = 0;
$game = new Game();
if (isset($_GET['again'])) {
}
session_start();
if (!isset($_GET['hit']) && !isset($_GET['stand'])) {
    $userHand[0] = $game->dealCard();
    $dealerHand[0] = $game->dealCard();
    $userHand[1] = $game->dealCard();
    $dealerHand[1] = $game->dealCard();
    $_SESSION['userHand'] = $userHand;
    $_SESSION['dealerHand'] = $dealerHand;
    $_SESSION['dHandValue'] = $game->getHandValue($_SESSION['dealerHand']);
} else if (isset($_GET['hit'])) {
    $_SESSION['userHand'][sizeof($_SESSION['userHand'])] = $game->dealCard();
    $_SESSION['userValue'] = $game->getHandValue($_SESSION['userHand']);
    $_SESSION['dHandValue'] = $game->getHandValue($_SESSION['dealerHand']);
    $_SESSION['uHandValue'] = $game->getHandValue($_SESSION['userHand']);
    if ($_SESSION['userValue'] == 21)
    $gameOver = $game->winCheck($_SESSION['userValue'], $_SESSION['dHandValue'], 0);
				} 
else if (isset($_GET['stand'])) 
{
	while ($_SESSION['dHandValue'] < 17) 
		{
    $_SESSION['dealerHand'][sizeof($_SESSION['dealerHand'])] = $game->dealCard();
    $_SESSION['dHandValue'] = $game->getHandValue($_SESSION['dealerHand']);
    $_SESSION['uHandValue'] = $game->getHandValue($_SESSION['userHand']);
    		}
	$gameOver = $game->winCheck($_SESSION['uHandValue'], $_SESSION['dHandValue'], 1);
}
	
?>

<html>
<head>
<style type="text/css">
body {
	margin:0px;
     }
</style>
</head>
<body>
    <h2 style='text-align:center;'>Blackjack</h2>
<div align='center' style="background-color:beige; padding:5px; width:300px; margin:auto;">
  <div style="text-decoration:underline; font-weight:bold;">Your Hand is:</div><br/>
    <?php
for ($i = 0; $i < sizeof($_SESSION['userHand']); $i++) 
{
        echo $game->translateCard($_SESSION['userHand'][$i]) . "<br />";
}
    echo "<div style='text-decoration:underline; font-weight:bold;'><br /><br />Dealer's hand: </div><br />";
	if ($gameOver == 0)
	{
		for ($j = 1; $j < sizeof($_SESSION['dealerHand']); $j++) 
		{
			echo $game->translateCard($_SESSION['dealerHand'][$j]) . "<br />";
		}
	}
	else
	{
		for ($j = 0; $j < sizeof($_SESSION['dealerHand']); $j++) 
		{
			echo $game->translateCard($_SESSION['dealerHand'][$j]) . "<br />";
		}
	}

	echo "<br /><br />";
	if ($gameOver == 0)
	{
        echo '<form style=\'text-align:center\' action=\'index.php\' method=\'get\'>
                      <input type=\'submit\' name=\'hit\' value=\'hit\'/><br />
                      <input type=\'submit\' name=\'stand\' value=\'stand\'/></form>';
    	}
	else
	{
      echo 'Your final score was: ' . $_SESSION['uHandValue'] . '<br /> Your opponents final score was: '.$_SESSION['dHandValue'].'
            <form style=\'text-align:center\' action=\'index.php\' method=\'get\'>
	    <input type=\'submit\' name=\'again\' value=\'Play Again\'/></form>';
	}
?>
</div>
</body>
</html>
