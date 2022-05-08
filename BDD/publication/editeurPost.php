<?php

require('BDD/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM publication WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){
            
           $question_id = $questionInfos['id_auteur'];

            $question_content = $questionInfos['contenu'];

            $question_content = str_replace('<br />', '', $question_content);

        }else{
            $errorMsg = "Vous n'avais pas l'auteur de cette publication";
        }

    }else{
        $errorMsg = "Aucune Publication n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune Publication n'a été trouvée";
}