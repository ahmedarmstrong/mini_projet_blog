


<?php

require('BDD/database.php');


if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $im = uniqid();
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "uplode/avatars/".$im.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $im.".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profile.php?id='.$_SESSION['id']);
         } else {
            $errorMsg ="Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $errorMsg ="Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $errorMsg ="Votre photo de profil ne doit pas dépasser 2Mo";
   }
}
?>