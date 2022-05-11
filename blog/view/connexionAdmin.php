<div class="text-center">
<h1 class=text-center>Connectez vous</h1>
<small class="form-text text-danger"><?= isset($formError['erreur']) ?$formError['erreur']: "" ?></small>
<form method="POST">
  <!--<div class="form-group">
    <label for="pseudo">pseudo</label>
    <input type="text" name="surname" class="form-control" >
  </div>-->
  <div class="form-group">
    <label for="exampleInputEmail1">email</label>
    <input type="text" name="email" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mot de passe</label>
    <input type="password" class="form-control" name="mdp" col="5" span="10"></input>
  </div><br>
  <button type="submit" class="btn btn-primary btn-lg" name="submitContact">envoyer</button>
</form><br>

<a href="index.php?inscription" style="color:black;">inscrivez vous</a>
</div>
