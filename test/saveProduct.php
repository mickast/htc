<?php
require_once "Csv.php";
require_once "DB.php";

$db = new DB("localhost", "intern_testmickast", "intern_mickast", "1234554321");
$db->saveFromFormToDB($_POST['named'], $_POST['code'], $_POST['category'], $_POST['check'], $_POST['area']);
$csv = new Csv("file.csv");
$csv->readForm($_POST['named'], $_POST['code'], $_POST['category'], $_POST['check'], $_POST['area']);
$csv->writeToCsv();
