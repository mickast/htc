<?php

/**
 * Created by PhpStorm.
 * User: kmi
 * Date: 28.04.2016
 * Time: 11:46
 */
class Csv
{
    private $dataList;
    private $fname;

    public function __construct($fname)
    {
        $this->fname = $fname;
    }

    public function readForm($named, $code, $category, $check, $area)
    {
        $this->dataList = array(
            array("Наименование", $named),
            array("Код товара", $code),
            array("Категория товара", $category),
            array("Популярный товар", $check),
            array("Описание товара", $area)
        );
        //print_r($this->dataList);
    }

    public function writeToCsv()
    {
        $fp = fopen($this->fname, 'a');
        foreach ($this->dataList as $line) {
            fputcsv($fp, $line);
        }
        fclose($fp);
    }

    public function readCsv()
    {
        $fp = fopen($this->fname, 'r');
        while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
            for ($c = 0; $c < count($data); $c++) {
                $dataListFromCsv[] = $data[$c];
            }
        }
        fclose($fp);
        return $dataListFromCsv;
    }

    public function printCsv($data)
    {
        echo "<table>";
        $i = 0;
        while ($i < count($data)) {
            echo "<tr>";
            echo "<td>";
            echo $data[$i];
            echo "</td>";
            echo "<td>";
            echo $data[$i + 1];
            echo "</td>";
            echo "</tr>";
            $i += 2;
        }
        echo "</table>";
    }
}