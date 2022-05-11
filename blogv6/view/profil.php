<div></div>
<div class="profil">
    <img src="assets/avatars/<?= $classprofil->avatars ?>" alt="" class="imageProfil">
   <h2>profil de <span class="bold"><?= $classprofil->pseudo ?></span></h2>
    <form action="" method = "post">
    <button class="modifProfil" name="modifProfil"><a href="index.php?modifprofil&idprofil=<?= $classprofil->id_user ?>">modifier le profil</a> </button> 
        <button class="btnSupProfil" name="supProfil">supprimer le profil</button>
    </form>
</div>
<div class="input-group2">
  <form action="" method="post">
  <input type="search" class="form-control1" placeholder="Search" name=rechercheprofile aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" name="btnrecherche2" class="btnprofilarticle" value="btnrechercheprofile">search</button>
  </form>
</div>
<?php

if(isset($fff) && !empty($fff)){
  foreach($fff as $searchuser){?>
  
  <div class="articleprofil">
  <img src="assets/avatars/<?= $searchuser->avatars ?>" alt="" class="imageProfilArticle">
  <span class="bold"><?= $searchuser->pseudo ?></span><br>
<?= $searchuser->msg ?><br><br><?= $searchuser->dateArticles ?>
  <div class ="divprofil">
    <form action="" method="post" name="formprofil" class=formprofile>
      <a class="btn btn-success"href="index.php?upArticle&idArticle=<?= $searchuser->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
      <button id="idDel" type="submit" class="btnDel" name="submitDelet" value="<?= $searchuser->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>
   </form>
    <a href="index.php?postCom&Articleid=<?= $searchuser->id ?>"><button class="btnComprofile" name="btnCom" type="submit" value = "">commentaire</button></a><br><br>
    <?php
     if($searchuser->nbrcom == 1){
     ?>
    <p><?= $searchuser->nbrcom?> commentaire</p>
     <?php
     }else if($searchuser->nbrcom > 1){
    ?>
    <p><?= $searchuser->nbrcom?> commentaires </p>
    <?php
    }else{

    }
    ?>
  </div>    
</div>



<?php }
}else{

   if (empty($classprofile)){
      ?>
        <p class="h1 text-danger text-font text-center">Vous n'avez pas encore ecrit de topics</p>
 <?php }elseif (!empty($classprofile)){
        foreach ($classprofile as $profile){
        ?>
<div class="articleprofil">
<img src="assets/avatars/<?= $profile->avatars ?>" alt="" class="imageProfilArticle">
<span class="bold"><?= $profile->pseudo ?></span><br>
<?= $profile->msg ?><br><br><?= $profile->dateArticles ?>
  <div class ="divprofil">
    <form action="" method="post" name="formprofil" class=formprofile>
      <a class="btn btn-success"href="index.php?upArticle&idArticle=<?= $profile->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
      <button id="idDel" type="submit" class="btnDel" name="submitDelet" value="<?= $profile->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>
   </form>
    <a href="index.php?postCom&Articleid=<?= $profile->id ?>"><button class="btnComprofile" name="btnCom" type="submit" value = "">commentaire</button></a><br><br>
    <?php
     if($profile->nbrcom == 1){
     ?>
    <p><?= $profile->nbrcom?> commentaire</p>
     <?php
     }else if($profile->nbrcom > 1){
    ?>
    <p><?= $profile->nbrcom?> commentaires </p>
    <?php
    }else{

    }
    ?>
  </div>    
</div>
<?php 
        
      }
    }
  }
 

?>

