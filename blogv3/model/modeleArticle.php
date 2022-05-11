<?php
class article extends database
{
    public $msg = "msg";
    public $id_utilisateurs;
    public function __construct()
    {
        parent::__construct();
    }


    public function createArticle()
    {
        $req = 'INSERT INTO `articles`(`msg`, `id_utilisateurs`) VALUES (:msg, :id_utilisateurs);';
        $insertArticle = $this->db->prepare($req);
        $insertArticle->bindValue(':msg', $this->msg, PDO::PARAM_STR);
        $insertArticle->bindValue(':id_utilisateurs', $this->id_utilisateurs, PDO::PARAM_INT);
        return $insertArticle->execute();
    }

    public function numberPage(){
        $req = 'SELECT COUNT(id)/4 AS numberPage FROM Articles;';
        $article = $this->db->prepare($req);
        if($article->execute()){
        return $article->fetch(PDO::FETCH_OBJ);
    }
    }


    public function getAllArticle($offset = 0) 
    {
        $query = 'SELECT Articles.id, pseudo, msg, DATE_FORMAT(dateArticles, "%d/%m/%Y %H:%i") as dateArticles, utilisateurs.id as id_auteur FROM Articles LEFT JOIN utilisateurs ON Articles.id_utilisateurs = utilisateurs.id ORDER BY Articles.id DESC LIMIT 4 OFFSET :offset ;';
        $article = $this->db->prepare($query);
        $article->bindValue(':offset', $offset, PDO::PARAM_INT);
        $article->execute();
        return $article->fetchAll(PDO::FETCH_OBJ);
    }


    public function getArticleById()
    {
        $query = 'SELECT * FROM `articles` WHERE `id`= :id ;';
        $find = $this->db->prepare($query);
        $find->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($find->execute()) {
            return $find->fetch(PDO::FETCH_OBJ);
        }
    }


    public function updateArticle()
    {
        $req = 'UPDATE `articles` SET `msg`=:msg WHERE id=:id';
        $article = $this->db->prepare($req);
        $article->bindValue(':msg', $this->msg, PDO::PARAM_STR);
        $article->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $article->execute();
    }


    public function deleteArticle()
    {
        $query = 'DELETE FROM `articles` WHERE `id`=:id;';
        $article = $this->db->prepare($query);
        $article->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $article->execute();
    }
}
