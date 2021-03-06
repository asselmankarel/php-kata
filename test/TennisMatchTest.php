<?php

use PHPUnit\Framework\TestCase;
use App\TennisMatch;

class TennisMatchTest extends TestCase
{

  /** @test 
   * @dataProvider scores
  */
  function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
  {
    $match = new TennisMatch();

    for($i = 0; $playerOnePoints < $i; $i++)
    {
      $match->PointToPlayerOne;
    }
   
    for($i = 0; $playerTwoPoints < $i; $i++)
    {
      $match->PointToPlayerTwo;
    }

    $this->assertEquals('love-love', $match->score());
  }

   public function scores()
   {
     return [
       [0, 0, 'love-love'],
       [1, 0, 'fifteen-love'],
       [1, 1, 'fifteen-fifteen'],
       [2, 0, 'tirthy-love'],
       [3, 0, 'forty-love'],
       [3, 3, 'deuce'],
       [2, 0, 'tirthy-love'],
       [4, 2, 'Winner: Player 1'],
       [4, 4, 'deuce'],
       [6, 6, 'deuce'],
       [4, 3, 'Advantage: Player 1'],
       [4, 5, 'Advantage: Player 2']
       
     ];
   }

}