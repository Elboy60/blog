<h1 class= text-center>Inscription</h1><br>
<small><?= isset($formError['erreur']) ? $formError['erreur'] : "" ?></small>
<div class="text-center">
<form method="POST">
  <div class="form-group ">
    <label>pseudo</label>
    <input type="text" name="pseudo" class="form-control" id="inputpseudo">
  </div> <div class="form-group">
    <label>email</label>
    <input type="email" name="email" class="form-control" id="inputmail">
  </div> <div class="form-group">
    <label>mot de passe</label>
    <input type="password" name="mdp" class="form-control" >
  </div><br>
  <button type="submit" class="btn btn-primary btn-lg" name="envoi">envoyer</button>
  </form>
</div>
<p> <?= isset($formError['error']) ? $formError['error'] : '' ?> </p>



<!--<form method="POST">
    <input type="text" name="pseudo" id="inputpseudo" placeholder="pseudo" autocomplete="OFF" required>
    <br>
    <input type="text" name="mail" id="inputmail" placeholder="mail" autocomplete="OFF">
    <br>
    <input type="password" name="mdp" placeholder="mot de passe" autocomplete="OFF">
    <br><br>
    <button><input type="submit" name="envoi"></button>
</form>-->
