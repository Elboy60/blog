<small><?= isset($formError['erreur']) ? $formError['erreur'] : "" ?></small>
<div class="divins">
  <h1 class="h1ins">Inscription</h1><br>
  <form class="formins" method="POST">
    <div class="divins1 ">
      <label class="labelin1">pseudo</label>
      <input type="text" name="pseudo" class="inputin1" id="inputpseudo">
    </div>
    <div class="divins2">
      <label class="labelin2">email</label>
      <input type="email" name="email" class="inputin2" id="inputmail">
    </div>
    <div class="divins3">
      <label class="labelin3">mot de passe</label>
      <input type="password" name="mdp" class="inputin3">
    </div><br>
    <button type="submit" class="btn4" name="envoi">envoyer</button>
  </form>
</div>
<p> <?= isset($formError['error']) ? $formError['error'] : '' ?> </p>


