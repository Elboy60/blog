<?php
class commentaire extends database{
    public $com = 'com';
    public $id_utilisateur;
    public $id_Articles;


    public function createCom(){
        $req = 'INSERT INTO `commentaires`(`commentaire`, `id_utilisateurs`, `id_Articles`) VALUES (:commentaire, :id_utilisateurs, :id_Articles);';
        $insertCom = $this->db->prepare($req);
        $insertCom->bindValue(':commentaire', $this->commentaire, PDO::PARAM_STR);
        $insertCom->bindValue(':id_utilisateurs', $this->id_utilisateurs, PDO::PARAM_INT);
        $insertCom->bindValue(':id_Articles', $this->id_Articles, PDO::PARAM_INT);
        return $insertCom->execute();
    }





}
