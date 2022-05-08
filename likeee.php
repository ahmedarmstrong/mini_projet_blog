
<?php


require('BDD/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);

    $article = $bdd->prepare ('SELECT * FROM publication WHERE id = ?') ;
    $article->execute(array($get_id));

    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $id= $article['id'] ;
        $contenu = $article['contenu'] ;
       

        $likes = $bdd->prepare('SELECT id FROM likes WHERE id_publication = ?');
        $likes->execute(array($id));
        $likes = $likes->rowCount();
    }else {
      die('cet');
       
}
}else {
    die('erreur');
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    
    <p><?= $contenu?></p>
    <a href="BDD/publication/likess.php?t=1&id=<?=$idOfPost ?>"> LiIKE </a> (<?= $likes ?>)
</body>
</html>