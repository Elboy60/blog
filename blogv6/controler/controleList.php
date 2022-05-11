<?php
$classArticle = new article();
$nbrPages = $classArticle->numberPage();
$curentPage;
//var_dump($nbrPages);
$nbrPagess = ceil($nbrPages->numberPage);
//var_dump($nbrPagess);
if(isset($_GET['page'])){ 
    $curentPage = htmlspecialchars(intval($_GET['page']));
}else{
    $curentPage = 1;
}
//var_dump($curentPage);
$offset = ($curentPage -1) * 4;

$article = $classArticle->getAllArticle($offset);

if(isset($_POST['submitDelet']))
{
    $classArticle->id = $_POST['submitDelet'];
    $classArticle->deleteArticle();
    header('location: index.php?home');
 }


