<?php

require('BDD/database.php');


$getAllPubss = $bdd->query('SELECT id, id_auteur, contenu, pseudo_auteur, date_publication,imagee FROM publication ORDER BY id DESC ');
$idOfPost = (int) $_GET['id'] ;
$likes = $bdd->prepare('SELECT id FROM likes WHERE id_publication = ?');            
$likes->execute(array($idOfPost));
$likes = $likes->rowCount();

		 