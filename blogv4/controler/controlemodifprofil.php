<?php
$profil = new users(); 
$profile = new article();
$profil->id = $_SESSION['id'];
//$profile->getAllArticle();
$classprofil = $profil->getUserByid();

if(isset($_POST['btnModif'])){
    $profil->pseudo=$_POST['pseudo'];
    $profil->email=$_POST['email'];
    $profil->updateUser();
    header('location:index.php?profil');
    exit();
}  