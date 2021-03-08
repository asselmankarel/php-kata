<?php

use PHPUnit\Framework\TestCase;
use App\BowlingGame;

class BowlingGameTest extends TestCase
{

  /** @test */
  function it_scores_a_gutter_game_as_zero() 
  {
    $game = new BowlingGame();

    foreach(range(1, 20) as $roll)
    {
      $game->roll(0);
    }

    $this->assertSame(0, $game->score());
  }

    /** @test */
    function it_scores_all_ones() 
    {
      $game = new BowlingGame();
  
      foreach(range(1, 20) as $roll)
      {
        $game->roll(1);
      }
  
      $this->assertSame(20, $game->score());
    }

     /** @test */
     function it_awards_a_bonus_roll_for_every_spare() 
     {
       $game = new BowlingGame();
       $game->roll(5);
       $game->roll(5);

       $game->roll(8);

   
       foreach(range(1, 17) as $roll)
       {
         $game->roll(0);
       }
   
       $this->assertSame(26, $game->score());
     }

     function it_awards_2_bonus_roll_for_every_strike() 
     {
       $game = new BowlingGame();
       $game->roll(10); //strike

       $game->roll(5);
       $game->roll(2);
   
       foreach(range(1, 16) as $roll)
       {
         $game->roll(0);
       }
   
       $this->assertSame(24, $game->score());
     }

      /** @test */
      function it_awards_an_extra_ball_for_spare_on_last_frame() 
      {
        $game = new BowlingGame();
        
        foreach(range(1, 18) as $roll)
        {
          $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5);
 
        $game->roll(5);
    
        $this->assertSame(15, $game->score());
      }

      /** @test */
      function it_awards_an_extra_ball_for_strike_on_last_frame() 
      {
        $game = new BowlingGame();
        
        foreach(range(1, 18) as $roll)
        {
          $game->roll(0);
        }

        $game->roll(10);

        $game->roll(10);
        $game->roll(10);
    
        $this->assertSame(30, $game->score());
      }

      /** @test */
      function it_scores_a_perfect_game()
      {
        $game = new BowlingGame();
        
        foreach(range(1, 12) as $roll)
        {
          $game->roll(10);
        }
    
        $this->assertSame(300, $game->score());

      }
}