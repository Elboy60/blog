<h1 class="h1modifprofile">modifier votre profil</h1>
<div class="modifprofile">
<form method="POST">
  <div class="form-group ">
    <label>nom</label>
    <input type="text" name="pseudo" class="form-control" id="inputnom" value= "<?= $classprofil->pseudo ?>">
  </div><div class="form-group">
    <label>email</label>
    <input type="email" name="email" class="form-control" id="inputmail" value="<?= $classprofil->email ?>">
  </div><br>
  <button type="submit" class="btn btn-primary btn-lg" name="btnModif">envoyer</button>
  </form>
  <div class="vide"></div>