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
        $this->dataList = array($named, $code, $category, $check, $area);

    }

    public function writeToCsv()
    {
        $fp = fopen($this->fname, 'a');
        fputcsv($fp, $this->dataList);
        fclose($fp);
    }

    public function readCsv()
    {

        $fp = fopen($this->fname, 'r');
        while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
            $dataListFromCsv[] = $data;
        }
        fclose($fp);
        return $dataListFromCsv;
    }

    public function printCsv($data)
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>Наименование</th>";
        echo "<th>Код товара</th>";
        echo "<th>Категория товара</th>";
        echo "<th>Популярный товар</th>";
        echo "<th>Описание товара</th>";
        echo "</tr>";
        //for($i = 0;$i<count($results);$i++){
        $i = 0;
        while($i<count($data)){
            echo "<tr>";
            echo "<td>";
            echo $data[$i][0];
            echo "</td>";
            echo "<td>";
            echo $data[$i][1];
            echo "</td>";
            echo "<td>";
            echo $data[$i][2];
            echo "</td>";
            echo "<td>";
            echo $data[$i][3];
            echo "</td>";
            echo "<td>";
            echo $data[$i][4];
            echo "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    }
}