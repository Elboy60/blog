<?php 

$classUser = new users();

$user = $classUser->getUser();
if(isset($_POST['submitDelet']))
{
    $classUser->id = $_POST['submitDelet'];
    $classUser->deleteUsers();
    header('location: index.php?listUser');
 }


 if (isset($_POST["btnrecherche"]) AND $_POST["btnrecherche"] == "Rechercher")
{
 $_POST["recherche"] = htmlspecialchars($_POST["recherche"]); //pour sécuriser le formulaire contre les failles html
 $recherche = $_POST["recherche"];
 $recherche = trim($recherche); //pour supprimer les espaces dans la requête de l'internaute
 $recherche = strip_tags($recherche); //pour supprimer les balises html dans la requête`
 $fff = $classUser->searchUsers($recherche);
 //var_dump($fff);
}
