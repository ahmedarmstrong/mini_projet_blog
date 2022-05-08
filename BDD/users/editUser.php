<?php

require('BDD/database.php');



    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfUser = $_GET['id'];
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($idOfUser));
        $user = $requser->fetch();
        if($user['id'] == $_SESSION['id']){

            if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
               $newnom = htmlspecialchars($_POST['newnom']);
               $insertnom = $bdd->prepare("UPDATE users SET nom = ? WHERE id = ?");
               $insertnom->execute(array($newnom, $_SESSION['id']));
               header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
                  $newprenom = htmlspecialchars($_POST['newnom']);
                  $insertprenom = $bdd->prepare("UPDATE users SET prenom = ? WHERE id = ?");
                  $insertprenom->execute(array($newprenom, $_SESSION['id']));
                  header('Location: profile.php?id='.$_SESSION['id']);
               }
               if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
                  $newpseudo = htmlspecialchars($_POST['newpseudo']);
                  $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
                  $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
                  header('Location: profile.php?id='.$_SESSION['id']);
               }
               if(isset($_POST['newgender']) AND !empty($_POST['newgender']) AND $_POST['newgender'] != $user['gender']) {
                  $newgender = htmlspecialchars($_POST['newgender']);
                  $insertgender = $bdd->prepare("UPDATE users SET gender = ? WHERE id = ?");
                  $insertgender->execute(array($newgender, $_SESSION['id']));
                  header('Location: profile.php?id='.$_SESSION['id']);
               }
            if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email']) {
               $newmail = htmlspecialchars($_POST['newmail']);
               $insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
               $insertmail->execute(array($newmail, $_SESSION['id']));
               header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(isset($_POST['newmdp']) AND !empty($_POST['newmdp'])) {
               $mdp = password_hash($_POST['newmdp'], PASSWORD_DEFAULT);
                  $insertmdp = $bdd->prepare("UPDATE users SET mdp = ? WHERE id = ?");
                  $insertmdp->execute(array($mdp, $_SESSION['id']));
                  header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(!empty($_POST['avatar']))  {
               $insertavatar = $bdd->prepare('INSERT INTO users (avatar) VALUES  (?)');
               $insertavatar->execute(array($avatar));
               header('Location: profile.php?id='.$_SESSION['id']);
            }
            if(!empty($_POST['avatar']))  {
               $modavatar = $bdd->prepare("UPDATE users SET avatar = ? WHERE id = ?");
               $modavatar->execute(array($avatar));
               header('Location: profile.php?id='.$_SESSION['id']);
            }
         }else{
            $errorMsg ="Vous n'avez pas le droit de Modifier ces paramatres !";
      }


    }


