<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$con = new PDO("mysql:host=localhost;dbname=kisKampiLinux;charset=utf8mb4", "root", "");

$articles = $con->query("SELECT * FROM articles");

foreach ($articles as $article){
    echo '<pre>';
    print_r($article);
    echo '</pre>';
}