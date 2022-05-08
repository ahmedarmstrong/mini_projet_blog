<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ahmed;charset=utf8;', 'root', '');

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t'] AND !empty($_GET['id']))){

    $getid = (int) $_GET['id'] ;
    $gett = (int) $_GET['t'] ;

    

    $check = $bdd->prepare('SELECT id FROM  publication WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1) {
        if($gett == 1) {
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_publication = ? AND id_auteur = ?');
            $check_like->execute(array($getid, $_SESSION['id']));
            
           
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM likes WHERE id_publication = ? AND id_auteur = ?');
                $del->execute(array($getid, $_SESSION['id']));
            }else{
                $insert = $bdd->prepare('INSERT INTO likes (id_publication, id_auteur) VALUES (?, ?)');
                $insert->execute(array($getid, $_SESSION['id']));
        }
    }
    header('Location: '. $_SERVER['HTTP_REFERER']);
}
    
}else{
    $errorMsg = "Aucune Publication n'a été trouvée";
}

