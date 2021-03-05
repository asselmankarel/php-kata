<?php
namespace App;

class StringCalculator
{
  const MAX_NUMBER_ALLOWED = 1000;
  protected string $delimiter = ",|\n";

  public function add(string $numbers): int
  {
    if (!$numbers)
    {
      return 0;
    }

    $numbers = $this->parseString($numbers);
    $numbers = $this->dissallowNegativeNumbers($numbers)->ignoreGreaterThan1000($numbers);

    return array_sum($numbers);
  }

  protected function dissallowNegativeNumbers(array $numbers): StringCalculator
  {
    foreach ($numbers as $number)
    {
      if ($number < 0)
      {
        throw new \Exception("Negative numbers are not allowed");
      }
    }

    return $this;
  }

  protected function parseString(string $numbers): array
  {
    if (preg_match("/\/\/(.)\n/", $numbers, $matches)) // extract custom delimiter if speciefied in string "//{$delimiter}\n"
    {
      $this->delimiter = $matches[1];
      $numbers = str_replace($matches[0], '', $numbers);
    }

    return preg_split("/{$this->delimiter}/", $numbers);
  }

  protected function ignoreGreaterThan1000(array $numbers): array
  {
    return array_filter($numbers, function ($number) {
      return $number <= self::MAX_NUMBER_ALLOWED;
    });
  }
}