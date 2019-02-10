<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (PDOException $e) {
    print $e->getMessage();
}
?>