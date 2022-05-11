<?php
$profil = new users(); 
$profile = new article();
$profil->id = $_SESSION['id'];
//$profile->getAllArticle();
$classprofil = $profil->getUserByid();
if(isset($_POST['btnModif'])){
if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){
    $tailleMax = 3500000;
    $extensionValid = array('jpg', 'jpeg', 'gif' , 'png');
    if(isset($_FILES['avatar']['size']) <= $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.' ), 1));
        if(in_array($extensionUpload, $extensionValid)){
            $chemin = "assets/avatars/".$_SESSION['id'].".".$extensionUpload ;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'] , $chemin );
            if($resultat){
                $profil->pseudo=$_POST['pseudo'];
                $profil->email=$_POST['email'];
                $profil->updateUser();
                $profil->avatars=$_SESSION['id'].".".$extensionUpload;
                $profil->updateAvatar();
                header('location:index.php?profil');
                exit();
            }else{
                $msg = "erreur durant l'importation de votre photo de profil";
            }
        }else{
            $msg = 'votre photo de profil doit etre au format jpg , jpeg , gif ou png';
        }
    }else{
        $msg = "la photo ne doit pas depasser 2 Mo !";
    }
}  
}  

