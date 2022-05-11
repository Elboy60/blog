<?php
 $com = new commentaire();
 $article = new article();
if(isset($_POST['btnCom'])){
        $formError = [];
        if(!empty($_POST['msg']) && isset($_SESSION['id'])){
            $msg = htmlspecialchars($_POST['msg']);
           
            $formSucces['succes'] = "votre commentaire a bien ete envoyer";
        }else{
            $formError['erreur'] ="veuillez completer tous les champs";
            header("location: index.php?connexionAdmin");
            //var_dump($formError);
            
         }

         if(empty($formError)){
            $com->com= $msg;
            $verifCom = $com->verifcom();
            //var_dump($verifCom); 
            if(is_object($verifCom)){
                if($verifCom->commentaire == $msg){
                    echo "le commentaire existe deja";
                }

            }else{
            $com->id_utilisateurs = $_SESSION['id'];
            $com->id_Articles = $_GET['Articleid'];
            $com->createCom();
           //echo $formSucces['succes'];
            }
            
         }   
 }
 if(isset($_GET['Articleid'])){
    $com->id_Articles = $_GET['Articleid'];
    $classCom=$com->getAllCommentaire();
    $article->id = $_GET['Articleid'];
    $classArticle = $article->getArticleById();
 }


 if(isset($_POST['deletcom']))
 {
    //var_dump($_POST['deletcom']);
     $com->id = $_POST['deletcom'];
     $com->deletecom();
     header('location:index.php?postCom&Articleid='.$_GET['Articleid']);
     
  }


$nbrPages = $com->numbercom();
$curentPage;
$nbrPagess = ceil($nbrPages->numberPage);
if(isset($_GET['page'])){ 
    $curentPage = htmlspecialchars(intval($_GET['page']));
}else{
    $curentPage = 1;
}
$offset = ($curentPage -1) * 4;

$classCom = $com->getAllCommentaire($offset);
