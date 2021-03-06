<?php

namespace App;
/** @group tennis */
class TennisMatch
{
  protected $playerOnePoints = 0;
  protected $playerTwoPoints = 0;

  public function score()
  {
    if ($this->hasWinner())
    {
      return 'Winner: ' . $this->leader();
    }

    if($this->isAdvantage())
    {
      return 'Advantage: ' . $this->leader();
    }

    if($this->isDeuce())
    {
      return 'deuce';
    }

    return sprintf("%s-%s", $this->pointsToTerm($this->playerOnePoints), $this->pointsToTerm($this->playerTwoPoints));  
  }

  public function pointToPlayerOne()
  {
    $this->playerOnePoints++;
  }

  public function pointToPlayerTwo()
  {
    $this->playerTwoPoints++;
  }

  private function pointsToTerm($score)
  {
    switch ($score)
    {
      case 0: return 'love';
      case 1: return 'fifteen';
      case 2: return 'tirthy';
      case 3: return 'forty';

    }
  }

  private function hasWinner(): bool
  {
    if($this->playerOnePoints > 3 && $this->playerOnePoints >= $this->playerTwoPoints + 2)
    {
      return true;
    }

    if($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints + 2)
    {
      return true;
    }
    return false;
  }

  private function leader(): string
  {
    return $this->playerOnepoint > 0 ? 'Player 1' : 'Player 2';
  }

  private function isDeuce()
  {
    return $this->playerOnePoints >= 3 && $this->playerOnePoints == $this->playerTwoPoints;
  }

  private function isAdvantage():bool
  {
    return $this->playerOnePoints >= 3 && ($this->playerTwoPoints >= $this->playerOnePoints || $this->playerOnePoints >= $this->playerTwoPoints);
  }

}