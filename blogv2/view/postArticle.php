<h1 class="h1post">Poster un article</h1>
<div class="post">
    <br />
    <div class=post1">
        <form class="formpost" method="POST">
            <textarea class="textpost" name="msg"></textarea>
            <button class="btnpost" type="submit" name="btnCreate">Poster article</button>
        </form>
        <small class="form-text text-danger"><?= isset($formError['erreur']) ? $formError['erreur'] : "" ?></small>
    </div>