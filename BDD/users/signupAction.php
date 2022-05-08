<?php
session_start();
require('BDD/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['gender']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['pseudo'])){
        
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_gender = htmlspecialchars($_POST['gender']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_pseudo = htmlspecialchars($_POST['pseudo']);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(nom, prenom, gender, email, mdp, pseudo)VALUES(?, ?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_lastname, $user_firstname, $user_gender, $user_email, $user_password, $user_pseudo));

            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom, gender FROM users WHERE nom = ? AND prenom = ? AND gender = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_gender, $user_pseudo));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['gender'] = $usersInfos['gender'];
            $_SESSION['email'] = $usersInfos['email'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            header('Location: login.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}