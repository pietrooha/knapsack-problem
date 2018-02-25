<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 22:22
 */
namespace KnapsackProblem\Algorithms;


class DynamicKnapsack extends Knapsack
{
  public function calculate(int $knapsackSize, array $listOfItems, int $n): int
  {
    $K = [];

    for ($i = 0; $i <= $n; $i++) {
      for ($w = 0; $w <= $knapsackSize; $w++) {
        if ($i==0 || $w==0)
          $K[$i][$w] = 0;
        else if ($listOfItems[$i-1]['item_weight'] <= $w)
          $K[$i][$w] = max($listOfItems[$i-1]['item_value'] + $K[$i-1][$w-$listOfItems[$i-1]['item_weight']],  $K[$i-1][$w]);
        else
          $K[$i][$w] = $K[$i-1][$w];
      }
    }
    return $K[$n][$knapsackSize];
  }
}
