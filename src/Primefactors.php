<?php
namespace App;

class PrimeFactors
{

  public static function generate(int $number)
  {
    $factors = [];
    $devisor = 2;

    while ($number > 1)
    {
      while ($number % $devisor === 0){
        $factors[] = $devisor;
        $number = $number / $devisor;
      }

      $devisor++;
    }

    return $factors;
  }
}