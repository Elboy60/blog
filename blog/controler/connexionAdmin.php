<?php
    if(isset($_POST['submitContact'])){
        $connexion = new users();
        $formError = [];
        if(!empty($_POST['email']) AND !empty($_POST['mdp'])/* AND !empty($_POST['pseudo'])*/){
            $mail = htmlspecialchars($_POST['email']);
            $connexion->mail = $mail;
            $MotDepasse =htmlspecialchars($_POST['mdp']);
            //$surname =htmlspecialchars($_POST['pseudo']);
            $formSucces['succes'] = "votre compte a bien été crée";
            $formSucces['connexion']="vous ete connecter";
    
            //echo "votre compte a ete crée";
        }else{
           // echo "veuillez completer tous les champs";
           $formError['erreur'] ="veuillez completer tous les champs";

        }
        if(empty($formError)){
            $verifConnexion = $connexion->session();
            if(is_object($verifConnexion)){
               //var_dump($verifConnexion);
                if ( ($mail == $verifConnexion->email)  && password_verify($MotDepasse , $verifConnexion->MotDepasse)){
                    $_SESSION['role'] = $verifConnexion->nom ;
                    $_SESSION['id']= $verifConnexion->id;
                    header('location: index.php?home');
                    echo 'bon</br>';
                }else {
                    echo 'mot de passe ou adresse mail incorrect';
                }
            }else {
                echo 'pas bon';
            }         
         }
    }
    
    