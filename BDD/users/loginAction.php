<?php
session_start();
require('BDD/database.php');


if(isset($_POST['validate'])){

 
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            
          
            $usersInfos = $checkIfUserExists->fetch();

            if(password_verify($user_password, $usersInfos['mdp'])){

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['gender'] = $usersInfos['gender'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                

                header('Location: index.php?id='.$_SESSION['id']);
    
            }else{
                $errorMsg = "Votre mot de passe est incorrect...";
            }

        }else{
            $errorMsg = "Votre pseudo est incorrect...";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}