<h1 class="h1list">Liste Utilisateurs</h1>
<div class="input-group1">
<form action="" method="post" name="formlistuser">
  <input type="search" class="form-control rounded" name="recherche" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" name="btnrecherche" class="btnlist1" value ="Rechercher">search</button>
</form>
</div>
</div>
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

  if(isset($fff) && !empty($fff)){
    foreach($fff as $searchuser){

    
    ?> 

<tbody>
        <tr>
          <td><?= $searchuser->id ?></td>
          <td><?= $searchuser->pseudo ?></td>
          <td><?= $searchuser->nom ?></td>
          <td> <?= $searchuser->email ?></td>
          <td>
            <form method="POST">
              <button type="submit" name="submitDelet" class="btnlist" value="<?= $searchuser->id ?>">supprimer</button>
            </form>
          </td>
        </tr>
      </tbody>
 
 <?php 
} 
}else{



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
} 
  ?>
</table>