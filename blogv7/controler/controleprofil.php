<?php
$profil = new users(); 
$profile = new article();
$com = new commentaire();

// permet d'aficher la page profil d'un autre utilisateur 
if(isset($_GET['profile'])){
  $profil->id = $_GET['profile'];
  $profile->id = $_GET['profile'];
  $com->id_utilisateurs = $_GET['profile'];
  $classprofil = $profil->getUserByid();
  $countCom = $com->countAllCom();
  $countArticle = $profile->countAllArticle();
  $classprofile = $profile->getArticleByIdUsers();
  //On crée un tableau pour stocker les ID des demandeurs dans la base des données
  $tabDemandeur = [];
  if(isset($_SESSION['id'])){
    $verifDemandeur = $profil->verfiDemandeur();
    foreach($verifDemandeur as $demandeur){
      //On rentre toutes les valeurs trouvées dans le tableau $tabDemandeur
      //array_push() = Empile un ou plusieurs éléments à la fin d'un tableau 
      array_push($tabDemandeur, intval($demandeur->id_demandeur));
    }
      
      //On verifie si l'Id de la personne connectée se trouve parmi les Ids dans le tableau
      //in_array() Indique si une valeur appartient à un tableau
    if(in_array($_SESSION['id'], $tabDemandeur)){
        $profil->id_receveur = $_GET['profile'];
        $profil->id_demandeur = $_SESSION['id'];
        $verifAmis = $profil->verifierAjoutAmis();
       
        if($verifAmis == false){
          $profil->id_receveur = $_SESSION['id'];
          $profil->id_demandeur = $_GET['profile'];
          $verifAmis = $profil->verifierAjoutAmis();
          
        }
    }else{
      //  var_dump('bon');
        $profil->id_receveur = $_SESSION['id'];
        $profil->id_demandeur = $_GET['profile'];
        $verifAmis = $profil->verifierAjoutAmis();
        // var_dump($verifAmis);
        
    }
    //permet d'ajouter , supprimer ou bloquer un utilisateur 
    if(isset($_POST['AjoutAmis'])){
        $profil->id_receveur = $_GET['profile'];
        $profil->id_demandeur = $_SESSION['id'];
        $amis =  $profil->verifierAjoutAmis();
        if(empty($amis)){
          $profil->statut = 2 ; 
          $profil->demandeAmisEnAttente();
          header('location:index.php?profil&profile='.$_GET['profile']);
        }
    }
    else if(isset($_POST['accepterAmis'])){
      if(in_array($_GET['profile'], $tabDemandeur)){
        $profil->id_receveur = $_SESSION['id'];
        $profil->id_demandeur = $_GET['profile'];
        $verifAmis = $profil->verifierAjoutAmis();
         if(!empty($verifAmis)){
           $profil->id = $verifAmis->id;
           $profil->statut = 1 ;
           $profil->demandeAmisAccepter();
           header('location:index.php?profil&profile='.$_GET['profile']);
        // var_dump($verifAmis->id);
       }
      }
    }
    else if(isset($_POST['bloquerAmis'])){
      if(in_array($_GET['profile'], $tabDemandeur)){
        $profil->id_receveur = $_SESSION['id'];
        $profil->id_demandeur = $_GET['profile'];
        $verifAmis = $profil->verifierAjoutAmis();
        $profil->statut = 3 ;
        if(empty($verifAmis)){
          $bloqueur = $profil->bloquerUser();
          header('location:index.php?profil&profile='.$_GET['profile']);
          //var_dump("2");
        }
        $profil->suprimerAmis(); 
        $bloqueur = $profil->bloquerUser();
        header('location:index.php?profil&profile='.$_GET['profile']);
        //var_dump("1");
    } else {
      $profil->id_receveur = $_GET['profile'];
      $profil->id_demandeur = $_SESSION['id'];
      $verifAmis = $profil->verifierAjoutAmis();
      $profil->statut = 3 ;
      if(empty($verifAmis)){
        $bloqueur = $profil->bloquerUser();
        header('location:index.php?profil&profile='.$_GET['profile']);
        //var_dump("4");
      }
      $profil->suprimerAmis(); 
      $bloqueur = $profil->bloquerUser();
      header('location:index.php?profil&profile='.$_GET['profile']);
      //var_dump("3");
    }
  }else if(isset($_POST['debloquer'])){
    $profil->id_receveur = $_GET['profile'];
    $profil->id_demandeur = $_SESSION['id'];
    $profil->suprimerAmis();
    header('location:index.php?profil&profile='.$_GET['profile']);
  } 
  else if(isset($_POST['suprimerAmis'])){ 
      if(in_array($_GET['profile'], $tabDemandeur)){
        $profil->id_receveur = $_SESSION['id'];
        $profil->id_demandeur = $_GET['profile'];
        $profil->suprimerAmis();
        header('location:index.php?profil&profile='.$_GET['profile']);
      }else{
        $profil->id_receveur = $_GET['profile'];
        $profil->id_demandeur = $_SESSION['id'];
        $profil->suprimerAmis();
        header('location:index.php?profil&profile='.$_GET['profile']);
      }
    }else if(isset($_POST['suprimerDemandeAmis'])){
      $profil->id_receveur = $_GET['profile'];
      $profil->id_demandeur = $_SESSION['id'];
      $profil->suprimerAmis();
      header('location:index.php?profil&profile='.$_GET['profile']);
      
    }
  }
  
  
  // affiche la page profil de l'utilisateur via ma page profil
}else{
    $profil->id = $_SESSION['id'];
    $profile->id = $_SESSION['id'];
    $com->id_utilisateurs = $_SESSION['id'];
    $classprofil = $profil->getUserByid();
    $countCom = $com->countAllCom();
    $countArticle = $profile->countAllArticle();

    $classprofile = $profile->getArticleByIdUsers();
    // permet de suprimer notre profil
    if(isset($_POST['submitDelet'])){
        $profile->msg=$_POST['delet'];
        $profile->id=$_POST['submitDelet'];
        $profile->deleteArticle();
        header('location:index.php?profil');
        exit();
    }
    // permet de rechercher un article de l'utilisateur
    if (isset($_POST["btnrecherche2"]) AND $_POST["btnrecherche2"] == "btnrechercheprofile"){
        $_POST["rechercheprofile"] = htmlspecialchars($_POST["rechercheprofile"]); //pour sécuriser le formulaire contre les failles html
        $rechercheprofile = $_POST["rechercheprofile"];
        $rechercheprofile = trim($rechercheprofile); //pour supprimer les espaces dans la requête de l'internaute
        $rechercheprofile = strip_tags($rechercheprofile); //pour supprimer les balises html dans la requête`
        $fff = $profile->searchArticleByUser($rechercheprofile);
        //var_dump($fff);
    }
    if(isset($_GET['profilid'])){
      $profil->pseudo = $_GET['profilid'];
    }
    
}







