<?php

require('BDD/database.php');


if(isset($_GET['id']) AND !empty($_GET['id'])){


    $idOfPost = $_GET['id'];


    $checkIfPostExists = $bdd->prepare('SELECT * FROM publication WHERE id = ?');
    $checkIfPostExists->execute(array($idOfPost));

    if($checkIfPostExists->rowCount() > 0){

        $PostInfos = $checkIfPostExists->fetch();

        $post_id = $PostInfos['id'];
        $post_content = $PostInfos['contenu'];
        $post_id_auteur = $PostInfos['id_auteur'];
        $post_pseudo_auteur = $PostInfos['pseudo_auteur'];
        $post_publication_date = $PostInfos['date_publication'];
        $post_imagee = $PostInfos['imagee'];
        
        
    }else{
        $errorMsg = "Aucune Publication n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune Publication n'a été trouvée";
}