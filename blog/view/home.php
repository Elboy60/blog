<h1 class=text-center>bienvenue sur notre blog</h1>

<div class="text-center">
<h2 class="text-primary mt-5">Liste des articles</h2>
<hr/>
<a class="nav-link" href="index.php?postArticle"><button type="button" class="btn btn-success">Poster un article</button></a>
<table class="table">
  <thead>
    <tr>
      <!--<th scope="col">msg</th>-->
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
    if(isset($_SESSION['id'])){
      //var_dump($_SESSION['id']);
    }
    if(empty($article)):
      
      ?>
<p class="h1 text-danger text-font">Aucun article en base de donnée</p>
    <?php elseif(!empty($article)):
    foreach($article as $article):
      ?>
      <div class="test text-center">
       <?= $article->pseudo ?><br> 
       <?= $article->msg ?><br><?= $article->dateArticles ?> 
       <?php if(isset($_SESSION['id'])){ 
             if(($_SESSION['id'] === $article->id_auteur) || $_SESSION['role'] === 'admin'){ ?>
        <br>
        <form action="" method="post">
          <a href="index.php?upArticle&idArticle=<?= $article->id?>"><button class="favorite styled btn btn-success" name="modif" type="button">modifier</button></div></a>
          <a href=""><button id="idDel"type="submit"class="btn btn-danger" name="submitDelet" value="<?= $article->id?>">supprimer</button></a>
        </form>
        <?php }} ?>
        <a href="index.php?postCom=<?= $article->id ?>"><button class="favorite styled btn btn-primary" type="button">commentaire</button></a>
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
     </div>
  </tbody>
</table>
</div>