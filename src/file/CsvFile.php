<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 10.02.18
 * Time: 18:15
 */
namespace KnapsackProblem\Files;


class CsvFile extends File
{
  public function __construct(string $filePath)
  {
    parent::__construct($filePath);
  }

  public function saveContentToArray(): array
  {
    if (($handle = fopen($this->filePath, "r")) !== FALSE) {
      $listOfItems = [];
      $fieldNames = [];

      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        $numbers = [];
        for ($i = 0; $i < $num; $i++) {
          if (!is_numeric($data[$i])) {
            $fieldNames[] = $data[$i];
          } else {
            $numbers[] = $data[$i];
          }
        }

        if (is_numeric($data[0])) {
          $listOfItems[] = [
            $fieldNames[0] => $numbers[0],
            $fieldNames[1] => $numbers[1],
            $fieldNames[2] => $numbers[2]
          ];
        }
      }
      fclose($handle);
      return $listOfItems;
    } else {
      return [];
    }
  }
}
