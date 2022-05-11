<div class="text-center">
    <h1>Modifier votre article</h1>
<form method="POST" class="row g-3 needs-validation">
   <textarea class="form-control" name="modif" rows="3"><?= $sdff->msg ?></textarea>
    <a href=""><button type="submit" class="btn btn-success" name="submitModif" value="<?= $sdff->id ?>">modifier</button></a>
    <?php
    if (isset($va)){
        echo $va;
    }
    ?>
</form>
</div>