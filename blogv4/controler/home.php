<?php
$profile = new article();

if (isset($_POST["btnrechercheArticleHome"]) AND $_POST["btnrechercheArticleHome"] == "btnrechercheArticle")
{
 $_POST["rechercheArticle"] = htmlspecialchars($_POST["rechercheArticle"]); //pour sécuriser le formulaire contre les failles html
 $rechercheprofile = $_POST["rechercheArticle"];
 $rechercheprofile = trim($rechercheprofile); //pour supprimer les espaces dans la requête de l'internaute
 $rechercheprofile = strip_tags($rechercheprofile); //pour supprimer les balises html dans la requête`
 $fff = $profile->searchAllArticle($rechercheprofile);
 //var_dump($fff);
}