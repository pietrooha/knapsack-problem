<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 18:11
 */
namespace KnapsackProblem\Files;


abstract class File
{
  protected $filePath = '';

  public function __construct(string $filePath)
  {
    $this->filePath = $filePath;
  }

  public final function createItemsArray(): array
  {
    if (file_exists($this->filePath)) {
      $listOfItem = $this->saveContentToArray();

      return $listOfItem;
    }
  }

  abstract function saveContentToArray(): array;
}
