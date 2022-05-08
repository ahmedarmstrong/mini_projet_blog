





<?php

$bdd = new PDO('mysql:host=localhost;dbname=ahmed;charset=utf8;', 'root', '');


session_start();


$idP=$_GET['id'];
$id_user =$_SESSION['id'];
$ps_user = $_SESSION['pseudo'];
$getPubs = $bdd->prepare('SELECT * FROM publication  WHERE id = ?');
$getPubs->execute(array($idP));
    if($getPubs->rowCount() > 0){
        $postInfos = $getPubs->fetch();
        $post_id = $postInfos['id'];
        $post_contenu = $postInfos['contenu'];

        $post_idauteur = $postInfos['id_auteur'];
        $post_psauteur = $postInfos['pseudo_auteur'];
        $post_date = $postInfos['date_publication'];
        $post_imagee = $postInfos['imagee'];
    }


                       
$par= $bdd->prepare('INSERT INTO publication (contenu, id_auteur,pseudo_auteur,imagee) VALUES (?, ?, ?, ?)');
$par->execute(array($post_contenu, $id_user, $ps_user, $post_imagee));

header('Location: ' . $_SERVER['HTTP_REFERER']);