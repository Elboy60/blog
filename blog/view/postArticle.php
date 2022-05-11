<div class="text-center">
<h1 class="text-primary mt-5">Poster un article</h1>
<br/>
<div class="mb-3">
<form class="row g-3 needs-validation" novalidate method="POST">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="msg" rows="3"></textarea>
    <button class="btn btn-primary" type="submit" name="btnCreate">Poster article</button>
</form>
<small class="form-text text-danger"><?= isset($formError['erreur']) ?$formError['erreur']: "" ?></small>
</div>