<?php

require('BDD/database.php');


if(isset($_POST['validatt'])){


    if(isset($_GET['id']) AND !empty($_POST['content'])){
        $idOfPost =  $_GET['id'] ;

   
        
        $new_content = nl2br(htmlspecialchars($_POST['content']));
        $new_date = date('d/m/Y');
        $P_id_author = $_SESSION['id'];
        $P_pseudo_author = $_SESSION['pseudo'];
    
        $insertP = $bdd->prepare('UPDATE publication SET contenu = ? WHERE id = ?');
        $insertP->execute(
            array(
                
                $new_content, 
               
                $idOfPost 
            )
        );
        header('Location: profile.php?id='.$_SESSION['id']);
        $successMsg = "Votre Publication a bien été publiée sur le site";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}