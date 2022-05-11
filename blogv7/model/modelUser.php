<?php
class users extends database
{
    public $pseudo;
    public $mdp;
    public $mail;
    public $avatars;
    public $id_receveur;
    public $id_demandeur;
    public $statut;
    public $id_bloqueur;



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
        $role = 'SELECT utilisateurs.`id` as id_user, `email`, `MotDepasse`, `pseudo`, `nom`, avatars FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE utilisateurs.id = :id';
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
        $query = 'SELECT pseudo , email FROM `utilisateurs` WHERE pseudo = :pseudo OR email = :email';
        $users = $this->db->prepare($query);
        $users->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $users->bindValue(':email', $this->mail, PDO::PARAM_STR);
        $users->execute();
        return $users->fetch(PDO::FETCH_OBJ);
    }


    public function updateUser() {
        $req = 'UPDATE utilisateurs SET pseudo = :pseudo, email = :email WHERE id = :id';
        $users = $this->db->prepare($req);
        $users->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $users->bindValue(':email', $this->email, PDO::PARAM_STR);
        $users->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $users->execute();
    }

    public function searchUsers($recherche){
        $rechercheUser ='SELECT utilisateurs.`id`, `email`, `MotDepasse`, `pseudo`, `nom` FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE pseudo LIKE ?';
        $users = $this->db->prepare($rechercheUser);
        $users->execute(array("%".$recherche."%"));
        return $users->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateAvatar(){
        $updateAvatar = "UPDATE utilisateurs SET avatars = :avatars WHERE id = :id";
        $avatar = $this->db->prepare($updateAvatar);
        $avatar->bindValue(':avatars', $this->avatars, PDO::PARAM_STR );
        $avatar->bindValue('id', $this->id, PDO::PARAM_INT);
        return $avatar->execute();
    }
        // table relation
    public function verifierAjoutAmis(){
    $ajouter = "SELECT id ,id_demandeur,id_receveur, statut FROM relation WHERE (id_receveur = :id_receveur AND id_demandeur = :id_demandeur) OR (id_demandeur = :id_demandeur AND id_receveur = :id_receveur) ";
    $ajouterAmis = $this->db->prepare($ajouter);
    $ajouterAmis->bindValue(":id_receveur" , $this->id_receveur , PDO::PARAM_INT);
    $ajouterAmis->bindValue(":id_demandeur" , $this->id_demandeur , PDO::PARAM_INT);
    $ajouterAmis->execute();
    return $ajouterAmis->fetch(PDO::FETCH_OBJ);
    }

    public function verfiDemandeur(){
        $ajouter = "SELECT id_demandeur FROM relation";
        $ajouterAmis = $this->db->prepare($ajouter);
        $ajouterAmis->execute();
        return $ajouterAmis->fetchAll(PDO::FETCH_OBJ);
    }

    public function demandeAmisEnAttente(){
        $demande = "INSERT INTO relation (`id_demandeur` , `id_receveur` , `statut`) VALUE (:id_demandeur, :id_receveur, :statut )";
        $demandeAttente = $this->db->prepare($demande);
        $demandeAttente->bindValue(":id_demandeur", $this->id_demandeur , PDO::PARAM_INT);
        $demandeAttente->bindValue(":id_receveur", $this->id_receveur , PDO::PARAM_INT);
        $demandeAttente->bindValue(":statut", $this->statut , PDO::PARAM_INT);
        return $demandeAttente->execute();
        
    }

    public function demandeAmisAccepter(){
        $demande = "UPDATE relation SET statut = :statut WHERE id = :id ";
        $demandeAccepter = $this->db->prepare($demande);
        $demandeAccepter->bindValue(":statut", $this->statut , PDO::PARAM_INT);
        $demandeAccepter->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $demandeAccepter->execute();
        
    }
    
    public function suprimerAmis(){
        $suprim = "DELETE FROM relation WHERE (id_receveur = :id_receveur AND id_demandeur = :id_demandeur) OR (id_demandeur = :id_demandeur AND id_receveur = :id_receveur)";
        $suprimAmis = $this->db->prepare($suprim);
        $suprimAmis->bindValue(":id_receveur", $this->id_receveur, PDO::PARAM_INT);
        $suprimAmis->bindValue(":id_demandeur", $this->id_demandeur, PDO::PARAM_INT);
        return $suprimAmis->execute();
    }

    public function bloquerUser(){
        $bloquer = "INSERT INTO relation (`id_demandeur` , `id_receveur` , `statut`) VALUE (:id_demandeur, :id_receveur, :statut)";
        $bloquerUser = $this->db->prepare($bloquer);
        $bloquerUser->bindValue(":id_demandeur", $this->id_demandeur , PDO::PARAM_INT);
        $bloquerUser->bindValue(":id_receveur", $this->id_receveur , PDO::PARAM_INT);
        $bloquerUser->bindValue(":statut", $this->statut , PDO::PARAM_INT); 
        return $bloquerUser->execute();
    }

}