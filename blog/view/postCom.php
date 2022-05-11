
<table>
<thead>
<h1>commentaire</h1><br>
</thead>
<tr>
<?php if(empty($com)):
      
?>
<p class="h1 text-danger text-font">Aucun commentaires</p>
    <?php elseif(!empty($com)):
    foreach($com as $com):
      ?>
      <div class="test text-center">
       <?= $com->commentaire ?><br> 
       <?= $com->id_utilisateurs ?><br><?= $com->id_Articles ?> 

    <?php endforeach;
    endif;
    ?> 
</tr> 
<div>
<form class="row g-3 needs-validation" novalidate method="POST">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="msg" rows="3"></textarea>
    <button class="btn btn-primary" type="submit" name="btnCom">Envoyer</button>
</form>
</div>
</table>



