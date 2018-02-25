<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 18:37
 */
namespace KnapsackProblem\Algorithms;


class NaiveKnapsack extends Knapsack
{
  public function calculate(int $knapsackSize, array $listOfItems, int $n): int
  {
    if ($n === 0 || $knapsackSize === 0)
      return 0;

    if ($listOfItems[$n-1]['item_weight'] > $knapsackSize) {
      return $this->calculate($knapsackSize, $listOfItems, $n-1);
    } else {
      $a = $listOfItems[$n-1]['item_value'] + $this->calculate($knapsackSize - $listOfItems[$n-1]['item_weight'], $listOfItems, $n-1);
      $b = $this->calculate($knapsackSize, $listOfItems, $n-1);
      $max = $this->max($a, $b);

      return $max;
    }
  }
}
