<?php
$com = new commentaire();
if(isset($_GET['idcom'])){
    $com->id=$_GET['idcom'];
    $modifcom = $com->getComById();
 }else{
     echo "pas bon id com";
 }
 if(isset($_POST['submitModifCom']) && !empty($_POST['modifcom'])){
    $com->com = $_POST['modifcom'];
    $com->id = $_POST['submitModifCom'];
    $com->updateCom();
    header('location:index.php?postCom&Articleid='.$_GET['articleid'].'&etat='.$_GET['etat']);
    exit();
 }
 