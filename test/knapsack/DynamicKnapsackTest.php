<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 11.02.18
 * Time: 20:36
 */
use PHPUnit\Framework\TestCase;
use KnapsackProblem\Algorithms\DynamicKnapsack;


class DynamicKnapsackTest extends TestCase
{
  private $listOfItems;
  private $knapsack;

  public function setUp()
  {
    $this->listOfItems = [
      [
        'item_id' => 1,
        'item_weight' => 10,
        'item_value' => 60
      ],
      [
        'item_id' => 2,
        'item_weight' => 20,
        'item_value' => 100
      ],
      [
        'item_id' => 3,
        'item_weight' => 30,
        'item_value' => 120
      ],
    ];

    $this->knapsack = new DynamicKnapsack(50);
  }

  public function tearDown()
  {
    $this->knapsack = null;
    $this->listOfItems = null;
  }

  public function testCalculate()
  {
    $this->assertEquals(220, $this->knapsack->calculate($this->knapsack->getKnapsackSize(), $this->listOfItems, sizeof($this->listOfItems)));
  }
}
