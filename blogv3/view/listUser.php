<h1 class="h1list">Liste Utilisateurs</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">pseudo</th>
      <th scope="col">role</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <?php
  //var_dump($user);
  if (!empty($user)) {
    foreach ($user as $classUser) {


  ?>
      <tbody>
        <tr>
          <td><?= $classUser->id ?></td>
          <td><?= $classUser->pseudo ?></td>
          <td><?= $classUser->nom ?></td>
          <td> <?= $classUser->email ?></td>
          <td>
            <form method="POST">
              <button type="submit" name="submitDelet" class="btnlist" value="<?= $classUser->id ?>">supprimer</button>
            </form>
          </td>
        </tr>
      </tbody>

  <?php
    }
  }
  ?>
</table>