<?php
 $article = new article();
if(isset($_GET['idArticle'])){
    $article->id=$_GET['idArticle'];
    $sdff = $article->getArticleById();
 }
 if(isset($_POST['submitModif'])&& !empty($_POST['modif'])){
    $article->msg=$_POST['modif'];
    $article->id=$_POST['submitModif'];
    $article->updateArticle();
    header('location:index.php?home');
    exit();
 }
 