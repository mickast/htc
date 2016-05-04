<?php

/**
 * Created by PhpStorm.
 * User: kmi
 * Date: 29.04.2016
 * Time: 13:20
 */
class Db
{
    private $db;
    public function __construct($host,$db_name,$user,$pass)
    {
        $dsn = "mysql:host=".$host.";dbname=".$db_name;
        $this->db = new PDO($dsn,$user,$pass);
        $this->db->exec('SET NAMES utf8');
    }
    public function saveFromFormToDB($name,$code,$category,$popular,$description)
    {
        $query = "INSERT INTO `products` (name,code,category,popular,description) VALUES ('$name','$code','$category','$popular','$description')";
        $pdh = $this->db->query($query);
    }
    public function readFromDb(){
        $query = "SELECT * FROM products";
        $pdh = $this->db->query($query);
        $data = $pdh->fetchAll();
        return $data;
    }
}