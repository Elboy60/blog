<?php
$profil = new users(); 
$profile = new article();
$profil->id = $_SESSION['id'];
$profile->id = $_SESSION['id'];
//$profile->getAllArticle();
$classprofil = $profil->getUserByid();

if(isset($_POST['supProfil']))
 {
   
     $classprofil->id = $_POST['supProfil'];
     $profil->deleteUsers();
     $_SESSION = array();
     session_destroy();
     header('location:index.php?connexionAdmin');
  }

$classprofile = $profile->getArticleByIdUsers();

if(isset($_POST['submitDelet'])){
  $profile->msg=$_POST['delet'];
  $profile->id=$_POST['submitDelet'];
  $profile->deleteArticle();
  header('location:index.php?profil');
  exit();
}

if (isset($_POST["btnrecherche2"]) AND $_POST["btnrecherche2"] == "btnrechercheprofile")
{
 $_POST["rechercheprofile"] = htmlspecialchars($_POST["rechercheprofile"]); //pour sécuriser le formulaire contre les failles html
 $rechercheprofile = $_POST["rechercheprofile"];
 $rechercheprofile = trim($rechercheprofile); //pour supprimer les espaces dans la requête de l'internaute
 $rechercheprofile = strip_tags($rechercheprofile); //pour supprimer les balises html dans la requête`
 $fff = $profile->searchArticleByUser($rechercheprofile);
 //var_dump($fff);
}