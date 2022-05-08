<?php



session_start();
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){


    $idOfPost = $_GET['id'];


    $checkIfPostExists = $bdd->prepare('SELECT id_auteur FROM publication WHERE id = ?');
    $checkIfPostExists->execute(array($idOfPost));

    if($checkIfPostExists->rowCount() > 0){

      
        $postInfos = $checkIfPostExists->fetch();
        if($postInfos['id_auteur'] == $_SESSION['id']){

     
            $deleteThisPost = $bdd->prepare('DELETE FROM publication WHERE id = ?');
            $deleteThisPost->execute(array($idOfPost));

            header('Location: ../../profile.php?id='.$_SESSION['id']);

        }else{
            $errorMsg = "Vous n'avez pas le droit de supprimer une Publication qui ne vous appartient pas !";
        }

    }else{
        $errorMsg = "Aucune Publication n'a été trouvée";
    }


}else{
    $errorMsg = "Aucune Publication n'a été trouvée";
}