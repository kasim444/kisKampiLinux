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
        if(is_null($this->id)){
            $this->create();
        }else{
            $this->update();
        }
    }
    public function create()
    {
        // INSERT INTO `articles` (`title`, `content`) VALUES 'Test Article Başlığı', 'Test Article Açıklaması');
        $createQuery = $this->con->prepare("INSERT INTO articles (`title`, `content`) VALUES (:baslik, :icerik) ");
        $createQuery->execute(array(
            "baslik"   => $this->title,
            "icerik" => $this->content,
        ));

        $this->id = $this->con->lastInsertId();
    }
    public function update()
    {
        // UPDATE `articles` SET `content` = 'Bu modelden ilk içerik3' WHERE `articles`.`id` = 3;
         $updateQuery = $this->con->prepare(" UPDATE articles SET title = :baslik, content = :icerik, updated_at = CURRENT_TIMESTAMP WHERE id = :kimlik ");
         $updateQuery->execute(array(
             "kimlik" => $this->id,
             "baslik" => $this->title,
             "icerik" => $this->content,
         ));
    }
}