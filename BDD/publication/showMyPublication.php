<?php

require('BDD/database.php');
if(isset($_GET['id']) AND !empty($_GET['id'])){
$idOfUser =  $_GET['id'] ;

$getAllMyPub = $bdd->prepare('SELECT id, id_auteur, pseudo_auteur, date_publication, contenu, imagee FROM publication WHERE id_auteur = ? ORDER BY id DESC') ;
$getAllMyPub->execute(array($idOfUser));



}
