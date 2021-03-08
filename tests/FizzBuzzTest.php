<?php

use PHPUnit\Framework\TestCase;
use App\FizzBuzz;

class FizzBuzzTest extends TestCase
{

  /** @test */
  function it_returns_fizz_for_multiples_of_three()
  {
    foreach([3,6,9,12] as $number)
    {
      $this->assertEquals('fizz', FizzBuzz::convert($number));
    }
  }

  /** @test */
  function it_returns_buzz_for_multiples_of_five()
  {
    foreach([5,10,20,25] as $number)
    {
      $this->assertEquals('buzz', FizzBuzz::convert($number));
    }
  }

   /** @test */
   function it_returns_fizzbuzz_for_multiples_of_three_and_five()
   {
     foreach([15,30,45,60] as $number)
     {
       $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
     }
   }

      /** @test */
      function it_returns_the_number_if_not_divisable_by_three_and_five()
      {
        foreach([1,2,4,7,11] as $number)
        {
          $this->assertEquals($number, FizzBuzz::convert($number));
        }
      }

}