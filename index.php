<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<script type='text/javaScript' src="bootstrap.min.js">
<style type="text/css">
body {
        margin:0px;
     }
</style>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

</head>
<body> 
<img src='http://www.manilastandardonline.com/wp-content/uploads/2017/10/Uncover-Various-Blackjack-Games-For-Different-Preferences.jpg'/>
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
		for ($c = 0; $c < 13; $c++)
		{
			for($s = 0; $s < 4; $s++)
			{
		array_push($this->DECK,$this->cards[$c].$this->suits[$s]);
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
		else if (preg_match($num_pattern,$face))
		{
                       while($uValue <= 10)
			return 11;
		}
		else
		{ 
			  return 1;
		}
		echo "Face: ".$face."<br />Suit: ".$suit."<br />";
	}
    public function winCheck($uValue, $dValue, $stand){
	    if($uValue > 21)
	{
            echo "<div style='background-color:red; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You've lost, better luck next time :)</div>";
            return 1;
        }
	else if ($dValue > 21)
	{
            echo "<div style='background-color:green; text-align:center; color:;black font-size:30px; font-weight:bold; padding:25px;'>You've won, you are good. </div>";
            return 1;
        }
	else if ($stand == 1)
	{
		if($uValue > $dValue)
	    {
               echo "<div style='background-color:green; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You've won, you are good.</div>";
                return 1;
            }
		else if ($uValue < $dValue)
	    {
                echo "<div style='background-color:red; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>You've lost, better luck next time :)</div>";
                return 1;
		}
		else
	    {
		    echo "<div style='background-color:orange; text-align:center; color:black; font-size:30px; font-weight:bold; padding:25px;'>It's a draw.</div>";
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLong">
  Rules
</button>
<div class="modal fade" id="ModalLong" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLongTitle">Rules of Blackjack</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<p>
1. Aces may be counted as 1 or 11 points, 2 to 9 according to pip value, and tens and face cards count as ten points.

2. The value of a hand is the sum of the point values of the individual cards. Except, a "blackjack" is the highest hand, consisting of an ace and any 10-point card, and it outranks all other 21-point hands.

3. After the players have bet, the dealer will give two cards to each player and two cards to himself. One of the dealer cards is dealt face up. The facedown card is called the "hole card."

4. If the dealer has a ten or an ace showing, then he will peek at his facedown card to see if he has a blackjack. If he does, then he will turn it over immediately.

5. If the dealer does have a blackjack, then all wagers will lose, unless the player also has a blackjack, which will result in a push. The dealer will resolve insurance wagers at this time.

5. The following are the choices available to the player:

   a) Stand: Player stands pat with his cards.
   b) Hit: Player draws another card (and more if he wishes). If this card causes the player's total points to exceed 21 (known as "breaking" or "busting") then he loses.

6. After each player has had his turn, the dealer will turn over his hole card. If the dealer has 16 or less, then he will draw another card. A special situation is when the dealer has an ace and any number of cards totaling six points (known as a "soft 17"). At some tables, the dealer will also hit a soft 17.

7. If the dealer goes over 21 points, then any player who didn't already bust will win.

8. If the dealer does not bust, then the higher point total between the player and dealer will win.</p>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
<div style="text-decoration:underline; font-weight:bold;">Your Hand is:</div><br/>
<?php
for ($x = 0; $x < sizeof($_SESSION['userHand']); $x++) 
{
        echo $game->translateCard($_SESSION['userHand'][$x]) . "<br />";
}
    echo "<div style='text-decoration:underline; font-weight:bold;'><br /><br />Dealer's hand: </div><br />";
	if ($gameOver == 0)
	{
		for ($y = 1; $y < sizeof($_SESSION['dealerHand']); $y++) 
		{
			echo $game->translateCard($_SESSION['dealerHand'][$y]) . "<br />";
		}
	}
	else
	{
		for ($y = 0; $y < sizeof($_SESSION['dealerHand']); $y++) 
		{
			echo $game->translateCard($_SESSION['dealerHand'][$y]) . "<br />";
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
