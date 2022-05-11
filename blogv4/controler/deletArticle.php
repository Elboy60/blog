<?php
 $article = new article();
if(isset($_GET['idArticle'])){
    $article->id=$_GET['idArticle'];
    $sdff = $article->getArticleById();
 }
 if(isset($_POST['submitDelet'])){
    $article->msg=$_POST['delet'];
    $article->id=$_POST['submitDelet'];
    $article->deleteArticle();
    header('location:index.php?home');
    exit();
 }