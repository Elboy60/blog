<div class="divup">
    <h1 class="h1up">Modifier votre article</h1>
    <form method="POST" class="formup text-center">
        <textarea class="textup" name="modif"><?= $sdff->msg ?></textarea>
        <a href=""><button type="submit" class="btnup" name="submitModif" value="<?= $sdff->id ?>">modifier</button></a>
        <?php
        if (isset($va)) {
            echo $va;
        }
        ?>
    </form>
</div>