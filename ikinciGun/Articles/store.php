<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//yeni makalenin kayıt işlemi yapılır.
require_once "classes/Article.php";

$article = new Article;
$article->title = "Bu modelden ilk başlık2";
$article->content = "Bu modelden ilk içerik2";
$article->save();

$article->title = "Güncellenen başlık ";
$article->content = "Güncellenen içerik";
$article->save();

