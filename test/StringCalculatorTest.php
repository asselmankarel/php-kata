<?php

use PHPUnit\Framework\TestCase;
use App\StringCalculator;

class StringCalculatorTest extends TestCase
{

  /** @test */
  function it_evaluates_an_empty_string_as_zero()
  {
    $calc = new StringCalculator();
    $this->assertSame(0, $calc->add(''));
  }

    /** @test */
    function it_find_the_sum_of_two_numbers()
    {
      $calc = new StringCalculator();
      $this->assertSame(10, $calc->add('5,5'));
    }

    /** @test */
    function it_find_the_sum_of_any_amount_of_numbers()
    {
      $calc = new StringCalculator();
      $this->assertSame(19, $calc->add('5,5,5,4'));
    }


}