<?php
class article extends database
{
    public $msg = "msg";
    public $id_utilisateurs;
    public $etatArticle;
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


    public function getArticleByIdUsers(){
        $req = 'SELECT COUNT(Commentaires.id) AS nbrcom, Articles.id, pseudo, msg, avatars, etatArticle, DATE_FORMAT(dateArticles, "%d/%m/%Y %H:%i") as dateArticles, utilisateurs.id AS id_user FROM Articles LEFT JOIN utilisateurs ON Articles.id_utilisateurs = utilisateurs.id LEFT JOIN Commentaires ON Articles.id = Commentaires.id_Articles WHERE Articles.id_utilisateurs = :id GROUP BY Articles.id ORDER BY Articles.id DESC ';
        $article = $this->db->prepare($req);
        $article->bindValue(':id', $this->id, PDO::PARAM_INT);
        $article->execute();
        return $article->fetchAll(PDO::FETCH_OBJ);

    }


    public function getAllArticle($offset = 0) 
    {
        $query = 'SELECT COUNT(Commentaires.id) AS nbrcom, Articles.id, pseudo, msg, avatars, DATE_FORMAT(dateArticles, "%d/%m/%Y %H:%i") as dateArticles, utilisateurs.id as id_auteur , etatArticle FROM Articles LEFT JOIN utilisateurs ON Articles.id_utilisateurs = utilisateurs.id LEFT JOIN Commentaires ON Articles.id = Commentaires.id_Articles GROUP BY Articles.id ORDER BY Articles.id DESC LIMIT 4 OFFSET :offset  ;';
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


    public function searchArticleByUser($recherche){
        $rechercheArticle ='SELECT COUNT(Commentaires.id) AS nbrcom, Articles.`id`, `msg`, `dateArticles`, `pseudo`, avatars, etatArticle FROM `Articles` INNER JOIN utilisateurs ON Articles.id_utilisateurs = utilisateurs.id LEFT JOIN Commentaires ON Articles.id = Commentaires.id_Articles WHERE msg LIKE ? AND Articles.id_utilisateurs = ? GROUP BY Articles.id';
        $article = $this->db->prepare($rechercheArticle);
        $article->execute(array("%".$recherche."%" , $this->id));
        return $article->fetchAll(PDO::FETCH_OBJ);
    }

    public function searchAllArticle($recherche){
        $rechercheArticle = 'SELECT COUNT(Commentaires.id) AS nbrcom, Articles.`id`, `msg`, `dateArticles`, `pseudo`, nom , avatars , utilisateurs.id AS id_auteur , etatArticle FROM `Articles` INNER JOIN utilisateurs ON Articles.id_utilisateurs = utilisateurs.id INNER JOIN Roles ON Roles.id = utilisateurs.id_Roles LEFT JOIN Commentaires ON Articles.id = Commentaires.id_Articles  WHERE msg LIKE ? GROUP BY Articles.id  ';
        $article = $this->db->prepare($rechercheArticle);
        $article->execute(array("%".$recherche."%"));
        return $article->fetchAll(PDO::FETCH_OBJ);
    }                           

    public function countAllArticle(){
        $req = 'SELECT COUNT(Articles.id) as countArticle FROM Articles WHERE id_utilisateurs = :id_utilisateurs';
        $article = $this->db->prepare($req);
        $article->bindValue(':id_utilisateurs', $this->id, PDO::PARAM_INT);
        $article->execute();
        return $article->fetch(PDO::FETCH_OBJ);
    }


    public function changeEtat(){
        $req = 'UPDATE Articles SET etatArticle = :etatArticle WHERE id = :id';
        $changeEtat = $this->db->prepare($req);
        $changeEtat->BindValue(':id', $this->id, PDO::PARAM_INT);
        $changeEtat->BindValue(':etatArticle', $this->etatArticle, PDO::PARAM_INT);
        return $changeEtat->execute();
    }

}
