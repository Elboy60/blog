<?php
session_start();
include "model/config.php";
include "model/database.php";
include "model/modelUser.php";
include 'model/modeleArticle.php';
include 'model/modelCom.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>blog</title>
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Navbar content -->
    <div class="container-fluid ">
      <a class="navbar-brand" href="index.php?home">Acceuil</a>
      <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'utilisateur') { ?>
          <li class="nav-item">
            <!--<a class="nav-link" href="index.php?connexionAdmin">connecté</a>-->
            <a class="nav-link text-danger" href="index.php?deconnexion" name="deco">deconnexion</a>
            <a class="nav-link" href="index.php?profil">Profil</a>
          </li>
        <?php  } else if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
          <div class="navAdmin">
            <a href="index.php?listUser" class="nav-link">liste des membres</a>
            <a class="nav-link" href="index.php?profil">Profil</a>
            <a class="nav-link text-danger" href="index.php?deconnexion" name="deco">deconnexion</a>
          </div>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?connexionAdmin">connexion</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <?php
  if (isset($_GET['home'])) {
    include 'controler/controleList.php';
    include 'view/home.php';
  } else if (isset($_GET['postArticle'])) {
    include 'controler/controleArticle.php';
    include 'view/postArticle.php';
  } else if (isset($_GET['connexionAdmin'])) {
    include 'controler/connexionAdmin.php';
    include 'view/connexionAdmin.php';
  } else if (isset($_GET['inscription'])) {
    include 'controler/contInscription.php';
    include 'view/inscription.php';
  } else if (isset($_GET['deconnexion'])) {
    include 'controler/deconnexion.php';
  } else if (isset($_GET['upArticle'])) {
    include 'controler/upArticle.php';
    include 'view/upArticle.php';
  } else if (isset($_GET['listUser'])) {
    include 'controler/listUsers.php';
    include 'view/listUser.php';
  }else if (isset($_GET['postCom'])) {
    include 'controler/ctrlpostCom.php';
    include 'view/postCom.php';
  }else if (isset($_GET['upCom'])) {
    include 'controler/ctrlupCom.php';
    include 'view/upCom.php';
  }else if (isset($_GET['profil'])) {
    include 'controler/controleprofil.php';
    include 'view/profil.php';
  }else if (isset($_GET['modifprofil'])) {
    include 'controler/controlemodifprofil.php';
    include 'view/modifprofil.php';
  }else if (isset($_GET['mentionlegale'])) {
    include 'view/mentionlegale.php';
  }else if (isset($_GET['politiquedeconfidentialite'])) {
    include 'view/politiquedeconfidentialite.php';
  }

  //Sinon affiche ma vue Home
  else {
    include 'controler/controleList.php';
    include 'view/home.php';
  }
  ?>
<footer>
  <div class="copyrigth">
    blog realiser par Guillaume Specque <br> Copyright © 2022 - tout droit reserver.
   <div class="footer">
    <a href="index.php?mentionlegale" class="mentionlegale">Mention legale</a>
    <a href="index.php?politiquedeconfidentialite">Politique de confidentialité</a>
   </div>
  </div>
</footer>
</body>

</html>