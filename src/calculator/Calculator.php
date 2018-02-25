<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 18:34
 */
namespace KnapsackProblem;

use KnapsackProblem\Files\File;
use KnapsackProblem\Algorithms\Knapsack;

require '../../vendor/autoload.php';


class Calculator
{
  private $file;
  private $knapsack;

  public function __construct(File $file, Knapsack $knapsack)
  {
    $this->file = $file;
    $this->knapsack = $knapsack;
  }

  public final function run(): int
  {
    if ($this->file->saveContentToArray()) {
      $listOfItem = $this->file->createItemsArray();
      return $this->knapsack->calculate($this->knapsack->getKnapsackSize(), $listOfItem, sizeof($listOfItem));
    }
    return 0;
  }
}
