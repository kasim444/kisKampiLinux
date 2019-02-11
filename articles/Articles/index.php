<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
// $con = new PDO("mysql:host=localhost;dbname=kisKampiLinux;charset=utf8mb4", "root", "");

// $articles = $con->query("SELECT * FROM articles");

// foreach ($articles as $article){
//     echo '<pre>';
//     print_r($article);
//     echo '</pre>';
// }

require_once "classes/Article.php";
$allArticles = Article::all();

foreach($allArticles as $article): ?>
    <a href="detail.php?id=<?=$article->id?>">
        <?=$article->title?>
    </a><br>
<?php endforeach; ?>