<?php
namespace App;

class PrimeFactors
{

  public static function generate(int $number)
  {
    $factors = [];

    for($devisor = 2; $number > 1; $devisor++)
    {
      while ($number % $devisor === 0){
        $factors[] = $devisor;
        $number = $number / $devisor;
      }
    }

    return $factors;
  }
}