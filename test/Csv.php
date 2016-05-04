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
        while (($data = fgetcsv($fp, 0, ",")) !== false) {
            $dataListFromCsv[] = $data;
        }
        fclose($fp);
        return $dataListFromCsv;
    }

    public function printCsv($data)
    {

    }
}
