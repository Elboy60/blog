<div></div>
<div class="profil">
    <h2>profil de <?= $classprofil->pseudo ?></h2>
    <form action="" method = "post">
    <button class="modifProfil" name="modifProfil"><a href="index.php?modifprofil&idprofil=<?= $classprofil->id_user ?>">modifier le profil</a> </button> 
        <button class="btnSupProfil" name="supProfil">supprimer le profil</button>
    </form>
</div>

<div class="articleprofil">

</div>

