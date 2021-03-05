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

    /** @test */
    function it_accepts_a_newLine_delimiter()
    {
      $calc = new StringCalculator();
      $this->assertSame(19, $calc->add("5\n5,5,4"));
    }

    /** @test */
    function negative_numbers_not_allowed()
    { 
      $calc = new StringCalculator();
      $this->expectException(\Exception::class);
      $calc->add("-5,5");
    }

    /** @test */
    function numbers_greater_then_1000_should_be_ignored()
    { 
      $calc = new StringCalculator();
      $this->assertSame(5, $calc->add("5,1001"));
      
    }

    /** @test */
    function support_custom_delimiters()
    {
      $calc = new StringCalculator();
      $this->assertSame(9, $calc->add("//:\n5:4"));
    }
}