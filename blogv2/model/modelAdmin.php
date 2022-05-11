<?php
/*9class admin extends database 
{
public $surname;
public $id;
public $mail ;
public $MotDepasse;


public function __construct(){
    parent::__construct();
}

    /**
     * Method qui retourne un TOKEN 
     * @return HASH
     */


/**
 * Method qui permet d'inseret un personnage en base de donnée
 *  @return bool
 */
//public function createAdmin(){
  //  $req = 'INSERT INTO `utilisateurs`(/*`surname`,*/ `email`, `MotDepasse`) VALUES (/*:surname ,*/ :email , :MotDepasse);';
    //$insertAdmin = $this->db->prepare($req);
   // $insertAdmin->bindValue(':surname', $this->surname, PDO::PARAM_STR);
    //$insertAdmin->bindValue(':email', $this->email, PDO::PARAM_STR);
    //$insertAdmin->bindValue(':MotDepasse', $this->MotDepasse, PDO::PARAM_STR);
    //return $insertAdmin->execute();
//}







   /**
     * Method qui permet de recuperer la liste des personnages
     * @return type SELECT
     */
    /*public function getAllPersonnages() {
        $query = 'SELECT * FROM `personnages`;';
        $perso = $this->db->query($query);
        return $perso->fetchAll(PDO::FETCH_OBJ);
    }


        /**
     * Method qui permet d'afficher un personnage ainsi que ses caractéritisques
     * @return bool
     */
    /*public function getPersonnageById(){
        $query = 'SELECT * FROM `personnages` WHERE `id`=:id ;';
        $find = $this->db->prepare($query);
        $find->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($find->execute()) {
            return $find->fetch(PDO::FETCH_OBJ);
        }
    }


    /**
     * Method  Qui permet de modifier un personnage
     * @return bool
     */
    /*public function updatePersonnage() {
        $req = 'UPDATE `personnages` SET `surname`=:surname , `atk`=:atk , `life`=:life , `color`=:color WHERE `id`=:id;';
        $personnage = $this->db->prepare($req);
        $personnage->bindValue(':surname', $this->surname, PDO::PARAM_STR);
        $personnage->bindValue(':atk', $this->atk, PDO::PARAM_INT);
        $personnage->bindValue(':life', $this->life, PDO::PARAM_STR);
        $personnage->bindValue(':color', $this->color, PDO::PARAM_STR);
        $personnage->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $personnage->execute();
    }

    /**
     * Method qui permet d'effacer un personnage
     * @return type DELETE
     */
    /*public function deletePersonnage() {
        $query = 'DELETE FROM `personnages` WHERE `id`=:id;';
        $article = $this->db->prepare($query);
        $article->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $article->execute();
    }*/
//}
