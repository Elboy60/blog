<div class="divco text-center">
  <h1>Connectez vous</h1>
  <small class="form-text text-danger"><?= isset($formError['erreur']) ? $formError['erreur'] : "" ?></small>
  <form class="formco" method="POST">

    <div class="divco1">
      <label>email</label>
      <input type="text" name="email" class="inputco1">
    </div>
    <div class="divco2">
      <label class="label1">mot de passe</label>
      <input type="password" class="inputco2" name="mdp"></input>
    </div><br>
    <button type="submit" class="btnco" name="submitContact">envoyer</button>

  </form><br>

  <a class="aco" href="index.php?inscription" style="padding-top: 10px;">inscrivez vous</a>
</div>