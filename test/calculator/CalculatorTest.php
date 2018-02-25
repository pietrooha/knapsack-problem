<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 23:44
 */
use PHPUnit\Framework\TestCase;
use KnapsackProblem\Files\CsvFile;
use KnapsackProblem\Algorithms\NaiveKnapsack;
use KnapsackProblem\Algorithms\DynamicKnapsack;
use KnapsackProblem\Calculator;

class CalculatorTest extends TestCase
{
  private $csvFile;
  private $calculator;
  private $csvFilePath1;
  private $csvFilePath2;

  public function setUp()
  {
    $this->csvFilePath1 = '../../tmp/knapsack-problem-data-1.csv';
    $this->csvFilePath2 = '../../tmp/knapsack-problem-data-2.csv';
  }

  public function tearDown()
  {
    $this->csvFile = null;
    $this->calculator = null;
    $this->csvFilePath1 = null;
    $this->csvFilePath2 = null;
  }

  public function testRunForNaiveKnapsack()
  {
    $this->csvFile = new CsvFile($this->csvFilePath2);
    $knapsackSize = 50;
    $naiveKnapsack = new NaiveKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $naiveKnapsack);
    $this->assertEquals(220, $this->calculator->run());
  }

  public function testRunForDynamicKnapsack()
  {
    $this->csvFile = new CsvFile($this->csvFilePath2);
    $knapsackSize = 60;
    $dynamicKnapsack = new DynamicKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $dynamicKnapsack);
    $this->assertEquals(280, $this->calculator->run());
  }

  public function testWhetherTwoAlgorithmsReturnTheSameResult()
  {
    $this->csvFile = new CsvFile($this->csvFilePath2);
    $knapsackSize = 50;
    $naiveKnapsack = new NaiveKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $naiveKnapsack);
    $naiveResult = $this->calculator->run();

    $dynamicKnapsack = new DynamicKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $dynamicKnapsack);
    $dynamicResult = $this->calculator->run();

    $this->assertEquals($naiveResult, $dynamicResult);
  }

  public function testNaiveOnGreaterSet()
  {
    $this->csvFile = new CsvFile($this->csvFilePath1);
    $knapsackSize = 120;
    $naiveKnapsack = new NaiveKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $naiveKnapsack);
    $this->calculator->run();

    $this->assertEquals(495, $this->calculator->run());
  }

  public function testDynamicOnGreaterSet()
  {
    $this->csvFile = new CsvFile($this->csvFilePath1);
    $knapsackSize = 200;
    $dynamicKnapsack = new DynamicKnapsack($knapsackSize);
    $this->calculator = new Calculator($this->csvFile, $dynamicKnapsack);
    $this->assertEquals(575, $this->calculator->run());
  }
}
