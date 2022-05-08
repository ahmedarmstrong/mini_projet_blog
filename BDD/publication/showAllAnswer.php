<?php

require('BDD/database.php');
$idOfPost = $_GET['id'];
$getAllAnswersOfPost = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_publication, contenu,datee FROM commentaire WHERE id_publication = ? ORDER BY id DESC');
$getAllAnswersOfPost->execute(array($idOfPost)); 