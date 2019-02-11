<?php

class Article
{
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
    public $view_count;

    protected $con;
    public function __construct()
    {
        $this->con =  new PDO("mysql:host=localhost;dbname=kiskampilinux;charset=utf8mb4;", "root", "");
    }
    public function save()
    {
        if(is_null($this->id)){ //Bu objenin id'si yok ise create metodunu çalıştır.
            $this->create();
        }else{
            $this->update();
        }
    }
    protected function create()
    {
        // INSERT INTO articles (title, content) VALUES 'Test Article Başlığı', 'Test Article Açıklaması');
        // Aynı sorguyu createQuery değişkeni ile birçok kez kullabiliriz.
        $createQuery = $this->con->prepare("INSERT INTO articles (title, content) VALUES (:baslik, :icerik) ");
        $result = $createQuery->execute(array(
            "baslik"   => $this->title,
            "icerik"   => $this->content,
        ));

        $this->id = $this->con->lastInsertId();

        return $result;
    }
    protected function update()
    {
        // UPDATE articles SET content = 'Bu modelden ilk içerik3' WHERE articles.id = 3;
         $updateQuery = $this->con->prepare(" UPDATE articles SET title = :baslik, content = :icerik, updated_at = CURRENT_TIMESTAMP WHERE id = :kimlik ");
         $updateQuery->execute(array(
             "kimlik" => $this->id,
             "baslik" => $this->title,
             "icerik" => $this->content,
         ));
    }

    public function delete()
    {
        $deleteQuery = $this->con->prepare("DELETE FROM articles WHERE id = :kimlik ");
        $deleteQuery->execute([
            "kimlik" => $this->id
        ]);
    }

    protected function checkIfExists()
    {
        $checkQuery = $this->con->prepare("SELECT COUNT(id) as satirSayisi FROM articles WHERE id = :kimlik ");
        $checkQuery->execute([ "kimlik" => $this->id ]);
        $response = $checkQuery->fetch();

        if ($response['satirSayisi'] > 0 ) return true;
        
        return false;
    }


    public function initById($disaridanGelenKimlik)
    {

        $selectQuery = $this->con->prepare("SELECT * FROM articles WHERE id = :kimlik ");
        $selectQuery->execute(["kimlik" => $disaridanGelenKimlik]);
        $articleResult = $selectQuery->fetch(PDO::FETCH_OBJ);


        $this->id         = $articleResult->id;
        $this->title      = $articleResult->title;
        $this->content    = $articleResult->content;
        $this->created_at = $articleResult->created_at;
        $this->updated_at = $articleResult->updated_at;
        $this->view_count = $articleResult->view_count;
    }

    public static function find($disaridanGelenId)
    {
        $no = new self;
        $no->initById($disaridanGelenId);
        return $no;
    }

    public function allArticles()
    {
        // bir Article objesinin içini, veritabanında ki ilgili kimlik
        // bilgisiyle saklı satırın bilgileriyle doldurulaım
        // fetch class ile birlikte mysql den gelen verileri direk olarak classtaki verileri doldurabiliyoruz. Lakin mysqldeki sütun isimleri ile class taki değişken isimleri birbiri ile aynı olmalı aksi taktirde uyuşmazlık yaşanır.

        $allQuery = $this->con->prepare("SELECT * FROM articles");
        $allQuery->execute();
        $allArticles = $allQuery->fetchAll(PDO::FETCH_CLASS, 'Article');
        return $allArticles;
    }
    public static function all()
    {
        $articleHelper = new self;
        $allArticles = $articleHelper->allArticles();
    }
}