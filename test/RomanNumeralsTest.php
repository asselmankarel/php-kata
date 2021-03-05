<?php

use PHPUnit\Framework\TestCase;
use App\RomanNumerals;

class RomanNumeralsTest extends testCase
{

  /** @test 
   * @dataProvider checks
  */
  function it_should_genrerate_roman_numeral($number, $expexted)
  {
    
    $this->assertEquals($expexted, RomanNumerals::generate($number));
  }

  /** @test */
  function it_should_return_false_if_number_less_then_1()
  {
    $this->assertFalse(RomanNumerals::generate(0));
  }

  /** @test */
  function it_should_return_false_if_number_greater_then_3999()
  {
    $this->assertFalse(RomanNumerals::generate(4000));
  }

  function checks()
  {
    return [
      [1, 'I'],
      [2, 'II'],
      [4, 'IV'],
      [5, 'V'],
      [19, 'XIX'],
      [90, 'XC'],
      [100, 'C'],
      [400, 'CD'],
      [501, 'DI'],
      [3999, 'MMMCMXCIX']
    ];
  }
}