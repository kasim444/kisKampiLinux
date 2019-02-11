<?php

// $_GET üzerinden aldığımız id ye göre  
require_once "classes/Article.php";

// $article = new Article;
// $article->initById($_GET['id']);
//yerine
$article = Article::find((int)$_GET['id']);
?>
<h1><?=$article->title?></h1>
<p><?=$article->content?></p>
Oluşturulma Tarihi : <?=$article->created_at?>
