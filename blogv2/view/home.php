<div class="test2">
  <h1 class="h1home">bienvenue sur notre blog</h1>

  <div class="divhome">
    <h2 class="text-primary mt-5">Liste des articles</h2>
    <hr />
    <a class="navhome" href="index.php?postArticle"><button type="button" class="btnhome">Poster un article</button></a>
  </div>
</div>
<table class="tablehome">
  <thead>
    <tr>
      <!--<th scope="col">msg</th>-->
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      if (isset($_SESSION['id'])) {
        //var_dump($_SESSION['id']);
      }
      if (empty($article)) :
      ?>
        <p class="h1 text-danger text-font">Aucun article en base de donnée</p>
        <?php elseif (!empty($article)) :
        foreach ($article as $article) :
        ?>
          <div class="testhome">
            <?php if(is_null($article->pseudo))
            { echo 'pseudo supprimer';
            }
            else{ 
           echo $article->pseudo;} ?><br><br>

            <?= $article->msg ?><br><br><?= $article->dateArticles ?>
            <?php if (isset($_SESSION['id'])) {
              if (($_SESSION['id'] === $article->id_auteur) || $_SESSION['role'] === 'admin') { ?>

                <div class="divhome2">
                  <form action="" method="post">
                    <a class="btn btn-success"href="index.php?upArticle&idArticle=<?= $article->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
                    <button id="idDel" type="submit" class="btnDel" name="submitDelet" value="<?= $article->id ?>">supprimer</button>
                    <a href="index.php?postCom"><button class="btnCom" type="submit">commentaire</button></a>
                  </form>
                </div>
                

            <?php }
            } 
            ?>
          </div>
    </tr>
<?php endforeach;
      endif;
?>
<div class="petitnom">
      <?php
        if($curentPage > 1){ ?>
       <a href="index.php?home&page=<?= $curentPage -1 ?>"><<</a>
   <?php   }
   for($page = 2 ; $page >= 1; $page--){
     if($curentPage - $page >= 1 ){ ?>
     <a href="index.php?home&page=<?= $curentPage - $page ?>"><?= $curentPage - $page ?></a>
  <?php }} ?>
       <a href="index.php?home&page=<?= $curentPage ?>"><?= $curentPage ?></a>
   <?php   
   for($pageplus = 1 ; $pageplus <= 2; $pageplus++){
     if($curentPage + $pageplus <= $nbrPagess){ ?>
     <a href="index.php?home&page=<?= $curentPage + $pageplus ?>"><?= $curentPage + $pageplus ?></a>
  <?php }} ?>
  <?php if($curentPage < $nbrPagess){ ?>
     <a href="index.php?home&page=<?= $curentPage +1 ?>">>></a>
  <?php } ?>

  </tbody>
</table>
</div>