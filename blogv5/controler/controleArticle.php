<?php

if(isset($_POST['btnCreate'])){
    $article = new article();
        $formError = [];
        if(!empty($_POST['msg']) && isset($_SESSION['id'])){
            $msg = htmlspecialchars($_POST['msg']);
            header("location: index.php?home");
            //$formSucces['succes'] = "votre commentaire a bien ete envoyer";
        }else{
            $formError['erreur'] ="veuillez completer tous les champs";
            header("location: index.php?connexionAdmin");
            //var_dump($formError);
         }

         if(empty($formError)){
            $article->msg = $msg;
            $article->id_utilisateurs = $_SESSION['id'];
            $article->createArticle();
            echo $formSucces['succes'];
         }
         
 }


?>