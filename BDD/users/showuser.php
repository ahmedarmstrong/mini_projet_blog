<?php

require("BDD/database.php");

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfUser = $_GET['id'];

    $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        
        $usersInfos = $checkIfUserExists->fetch();
        $user_id = $usersInfos['id'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];
        $user_gender = $usersInfos['gender'];
        $user_email = $usersInfos['email'];
        $user_mdp = $usersInfos['mdp'];
        $user_pseudo = $usersInfos['pseudo'];
        $user_avatar = $usersInfos['avatar'];

        

    }else{
        $errorMsg = "Aucun user trouvé";
    }

}else{
    $errorMsg = "Aucun user trouvé";
}