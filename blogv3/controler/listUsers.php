<?php 

$classUser = new users();

$user = $classUser->getUser();
if(isset($_POST['submitDelet']))
{
    $classUser->id = $_POST['submitDelet'];
    $classUser->deleteUsers();
    header('location: index.php?listUser');
 }
