<?php

// liée avec la base de donnée
$users = new users();
if (isset($_POST['envoi'])) {
     //relié au model.php avec (class users extends)
    $formError = [];
    $formSucess = [];
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['email'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']); // protéger des xss
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // proteger mdp et xss
        $mail = htmlspecialchars($_POST['email']);

        $formSucess['sucess'] =  "compte crée!";
    } else {
       echo $formError['pseudo'] = "pseudo non validée! <br>";
       echo $formError['mdp'] = "mdp non validée! <br>";
       echo $formError['mail'] = "mail non validée!";
    }

    if (empty($formError)) {
        $users->pseudo = $pseudo;
        $users->mdp = $mdp;
        $users->mail = $mail;
        $users->InsertUsers(); // InsertUsers relié a modelUsers (quand elle a ete cree)
        header('location:index.php?connexionAdmin');
        //var_dump($users);
    }
}
$users->getUser();






/*if(isset($_POST['btnCreate'])){
    $article = new article();
        $formError = [];
        if(!empty($_POST['msg'])){
            $msg = htmlspecialchars($_POST['msg']);

            $formSucces['succes'] = "votre commentaire a bien ete envoyer";
        }else{
            $formError['erreur'] ="veuillez completer tous les champs";
            var_dump($formError);
         }

         if(empty($formError)){
            $article->msg = $msg;
            $article->createArticle();
            echo $formSucces['succes'];
         }
 }*/






              // AUTRE MANIERE DE FAIRE

/*if (isset($_POST['envoi'])) {
    $users = new users();
    $formError = [];
    $formSucess = [];
    if (!empty($_POST['pseudo']) && isset($_POST['pseudo'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
    } else {
        $formError['pseudo'] = "pseudo non validée!";
    }
    if (!empty($_POST['mdp']) && isset($_POST['mdp'])) {
        $mdp = sha1($_POST['mdp']);
    } else {
        $formError['mdp'] = "mdp non validée!";
    }
    if (!empty($_POST['mail']) && isset($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $formError['mail'] = "mail non validée!";
    }

    if (empty($formError)) {
        $users->pseudo = $pseudo;
        $users->mdp = $mdp;  // defini par defaut avec le = 5
        $users->mail = $mail;
        $users->InsertUsers(); //préciser la method (quand elle a ete cree)
        var_dump($users);
    }
}*/