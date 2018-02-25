<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 18:07
 */
namespace KnapsackProblem\Algorithms;


abstract class Knapsack
{
  protected $knapsackSize;

  public function __construct(int $knapsackSize)
  {
    $this->knapsackSize = $knapsackSize;
  }

  abstract function calculate(int $knapsackSize, array $listOfItems, int $n): int;

  protected function max(int $a, int $b): int
  {
    return ($a > $b) ? $a : $b;
  }

  public function getKnapsackSize(): int
  {
    return $this->knapsackSize;
  }
}
