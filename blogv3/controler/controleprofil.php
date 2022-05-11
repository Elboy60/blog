<?php
$profil = new users(); 
$profile = new article();
$profil->id = $_SESSION['id'];
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

