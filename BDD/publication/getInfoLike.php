<?php

require('BDD/database.php');


$article = $bdd->query ('SELECT * FROM publication ') ;
    
    
    
       
    while($question = $article->fetch()){
        $likes = $bdd->prepare('SELECT id FROM likes WHERE id_publication = ?');
        $likes->execute(array($question['id'] ));
        $likess = $likes->rowCount();
    
    }


