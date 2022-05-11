<?php
class users extends database
{
    public $pseudo;
    public $mdp;
    public $mail;




    public function __construct()
    {
        parent::__construct();
    }


    public function InsertUsers()
    {
        $requete = 'INSERT INTO `utilisateurs`(`pseudo`, `email`, `MotDepasse`) VALUES (:pseudo , :email , :MotDepasse)';
        $insert = $this->db->prepare($requete);
        $insert->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);  // string(mot/phrase)
        $insert->bindValue(':MotDepasse', $this->mdp, PDO::PARAM_STR);
        $insert->bindValue(':email', $this->mail, PDO::PARAM_STR);      
        return $insert->execute();
    }



    public function deleteUsers() {
        $query = 'DELETE FROM `utilisateurs` WHERE `id`= :id ;';
        $users = $this->db->prepare($query);
        $users->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $users->execute();
    }


    public function getUser(){
        $role = 'SELECT utilisateurs.`id`, `email`, `MotDepasse`, `pseudo`, `nom` FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id';
        $selectUsers = $this->db->query( $role);
        $selectUsers->execute();
        return $selectUsers->fetchAll(PDO::FETCH_OBJ);
         
        // var_dump($dd);
    }

    public function getUserByid(){
        $role = 'SELECT utilisateurs.`id` as id_user, `email`, `MotDepasse`, `pseudo`, `nom` FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE utilisateurs.id = :id';
        $selectUsers = $this->db->prepare( $role);
        $selectUsers->bindValue(':id' , $this->id, PDO::PARAM_INT);
        $selectUsers->execute();
        return $selectUsers->fetch(PDO::FETCH_OBJ);
         
        // var_dump($dd);
    }
  
    public function session(){
        $garderSession = 'SELECT utilisateurs.id , email, pseudo, MotDepasse, nom FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE `email` = :email';
        $selectUsers = $this->db->prepare($garderSession);
        $selectUsers->bindValue(':email', $this->mail, PDO::PARAM_STR); 
        $selectUsers->execute();
        return $selectUsers->fetch(PDO::FETCH_OBJ);
    }


    public function verifuser(){
        $query = 'SELECT * FROM utilisateurs WHERE pseudo = :pseudo';
        $users = $this->db->prepare($query);
        $users->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $users->execute();
        return $users->fetchAll(PDO::FETCH_OBJ);
    }


    public function updateUser() {
        $req = 'UPDATE utilisateurs SET pseudo = :pseudo, email = :email WHERE id = :id';
        $users = $this->db->prepare($req);
        $users->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $users->bindValue(':email', $this->email, PDO::PARAM_STR);
        $users->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $users->execute();
    }
}