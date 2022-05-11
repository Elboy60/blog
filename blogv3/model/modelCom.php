<?php
class commentaire extends database{

    public $com;
    public $id_utilisateurs;
    public $id_Articles;


    public function createCom(){
        $req = 'INSERT INTO `commentaires`(`commentaire`, `id_utilisateurs`, `id_Articles`) VALUES (:commentaire, :id_utilisateurs, :id_Articles);';
        $insertCom = $this->db->prepare($req);
        $insertCom->bindValue(':commentaire', $this->com, PDO::PARAM_STR);
        $insertCom->bindValue(':id_utilisateurs', $this->id_utilisateurs, PDO::PARAM_INT);
        $insertCom->bindValue(':id_Articles', $this->id_Articles, PDO::PARAM_INT);
        return $insertCom->execute();
    }

    public function getAllCommentaire($offset = 0) 
    {
        $query = 'SELECT pseudo , commentaire, Commentaires.id, id_utilisateurs as id_auteur FROM commentaires LEFT JOIN utilisateurs ON Commentaires.id_utilisateurs = utilisateurs.id WHERE id_Articles = :id_Articles ORDER BY Commentaires.id DESC  LIMIT 4 OFFSET :offset ;';
        $getCom = $this->db->prepare($query);
        $getCom->bindValue(':id_Articles', $this->id_Articles, PDO::PARAM_INT);
        $getCom->bindValue(':offset', $offset, PDO::PARAM_INT);
        $getCom->execute();
        return $getCom->fetchAll(PDO::FETCH_OBJ);
    }

    public function verifcom(){
        $query = 'SELECT * FROM commentaires WHERE commentaire = :commentaire';
        $getCom = $this->db->prepare($query);
        $getCom->bindValue(':commentaire', $this->com, PDO::PARAM_STR);
        $getCom->execute();
        return $getCom->fetch(PDO::FETCH_OBJ);
    }

    public function getComById()
    {
        $query = 'SELECT * FROM `commentaires` WHERE `id`=:id ;';
        $find = $this->db->prepare($query);
        $find->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($find->execute()) {
            return $find->fetch(PDO::FETCH_OBJ);
        }
    }


    public function updateCom()
    {
        $req = 'UPDATE `commentaires` SET `commentaire` = :commentaire WHERE id = :id';
        $modifCom = $this->db->prepare($req);
        $modifCom->bindValue(':commentaire', $this->com, PDO::PARAM_STR);
        $modifCom->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifCom->execute();
    }

    public function deleteCom()
    {
        $query = 'DELETE FROM `commentaires` WHERE `id`= :id;';
        $deletcom = $this->db->prepare($query);
        $deletcom->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deletcom->execute();
    }


    public function numbercom(){
        $req = 'SELECT COUNT(id)/4 AS numberPage FROM commentaires;';
        $numbrcom = $this->db->prepare($req);
        if($numbrcom->execute()){
        return $numbrcom->fetch(PDO::FETCH_OBJ);
    }
    }   
}