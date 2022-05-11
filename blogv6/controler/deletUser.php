<?php
 $user = new user();

 if(isset($_POST['submitDelet'])){
    
    if(){
    $user->msg=$_POST['delet'];
    $user->id=$_POST['submitDelet'];
    $user->deleteUsers();
    //header('location:index.php?home');
    exit();
 }}