<?php
class users extends database
{
    public $pseudo;
    public $mdp;
    public $mail;



    // method __construct qui se connect a ma database

    public function __construct()
    {
        parent::__construct();
    }

    // method qui sert a aller recuperer mes donnees dans la database

    public function InsertUsers()
    {
        $requete = 'INSERT INTO `utilisateurs`(`pseudo`, `email`, `MotDepasse`) VALUES (:pseudo , :email , :MotDepasse)';
        $insert = $this->db->prepare($requete);
        $insert->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);  // string(mot/phrase)
        $insert->bindValue(':MotDepasse', $this->mdp, PDO::PARAM_STR);
        $insert->bindValue(':email', $this->mail, PDO::PARAM_STR);      //entier (number)
        return $insert->execute();
    }



    public function deleteUsers() {
        $query = 'DELETE FROM `utilisateurs` WHERE `id`= :id ;';
        $users = $this->db->prepare($query);
        $users->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $users->execute();
    }

    // public function deleteUsers() {
    //     $query = 'DELETE CASCADE FROM `utilisateurs` WHERE id = :id';
    //     $users = $this->db->prepare($query);
    //     $users->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     return $users->execute();
    // }

    public function getUser(){
        $role = 'SELECT utilisateurs.`id`, `email`, `MotDepasse`, `pseudo`, `nom` FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id';
        $selectUsers = $this->db->query( $role);
        $selectUsers->execute();
        return $selectUsers->fetchAll(PDO::FETCH_OBJ);
         
        // var_dump($dd);
    }
  
    public function session(){
        $garderSession = 'SELECT utilisateurs.id , email, pseudo, MotDepasse, nom FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE `email` = :email';
        $selectUsers = $this->db->prepare($garderSession);
        $selectUsers->bindValue(':email', $this->mail, PDO::PARAM_STR); 
        $selectUsers->execute();
        return $selectUsers->fetch(PDO::FETCH_OBJ);
    }


   /* public function getUserById(){
        $query = 'SELECT id, pseudo FROM ` utilisateurs` WHERE `id`=:id ;';
        $find = $this->db->prepare($query);
        $find->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($find->execute()) {
            return $find->fetch(PDO::FETCH_OBJ);
        }
    }*/









    // recup la liste des perso

  /*  public function getAllUsers()
    {
        $query = 'SELECT * FROM `users`;';
        $user = $this->db->query($query);
        return $user->fetchAll(PDO::FETCH_OBJ);
    }*/
}