<div class="color"></div>
<div class="divArticle"> 
     <?=  $classArticle->msg; ?>
 </div>
<h2 class="h1up">espace commentaire</h2>
<?php if(empty($classCom)):
?>
<p class="h1 text-danger text-font text-center">Ecrivez le premier commentaires</p>
<?php elseif(!empty($classCom)):
      foreach($classCom as $com):
 ?>

<div class="espaceCom">
<?php if(is_null($com->pseudo))
            { echo 'pseudo supprimer';
            }
            else{ 
           echo $com->pseudo ;} ?><br><br> 
          <?= $com->commentaire ?><br> 

<?php if (isset($_SESSION['id'])) {
        if (($_SESSION['id'] === $com->id_auteur) || $_SESSION['role'] === 'admin') { ?>

    <form method="post">
    <a class="btn btn-success"href="index.php?upCom&idcom=<?= $com->id ?>&articleid=<?= $classArticle->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
    <button id="idDel" type="submit" class="btnDel" name="deletcom" value="<?= $com->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button>
    </form>
         <?php }
            } ?>
</div>
<?php endforeach;
      endif;
?> 
<div class="petitnom">
      <?php
        if($curentPage > 1){ ?>
       <a href="index.php?postCom&page=<?= $curentPage -1 ?>&Articleid=<?= $_GET['Articleid'] ?>"><<</a>
   <?php   }
   for($page = 2 ; $page >= 1; $page--){
     if($curentPage - $page >= 1 ){ ?>
     <a href="index.php?postCom&page=<?= $curentPage - $page ?>&Articleid=<?= $_GET['Articleid'] ?>"><?= $curentPage - $page ?></a>
  <?php }} ?>
       <a href="index.php?postCom&page=<?= $curentPage ?>&Articleid=<?= $_GET['Articleid'] ?>"><?= $curentPage ?></a>
   <?php   
   for($pageplus = 1 ; $pageplus <= 2; $pageplus++){
     if($curentPage + $pageplus <= $nbrPagess){ ?>
     <a href="index.php?postCom&page=<?= $curentPage + $pageplus ?>&Articleid=<?= $_GET['Articleid'] ?>"><?= $curentPage + $pageplus ?></a>
  <?php }} ?>
  <?php if($curentPage < $nbrPagess){ ?>
     <a href="index.php?postCom&page=<?= $curentPage +1 ?>&Articleid=<?= $_GET['Articleid'] ?>">>></a>
  <?php } ?>

<h2 class = textcom>écriver votre commentaire</h2>
<div class="divup">
    <form method="POST" class="formup text-center">
        <textarea class="textup" name="msg"></textarea>
        <button type="submit" class="btnup" name="btnCom" value="">envoyer</button>
    </form>
</div>