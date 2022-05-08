<?php

require('BDD/database.php');


if(isset($_POST['validat'])){
    $idOfPost = $_GET['id'];
    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO commentaire(id_auteur, pseudo_auteur, id_publication, contenu)VALUES(?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfPost, $user_answer));

    }header('Location: ' . $_SERVER['HTTP_REFERER']);


}            