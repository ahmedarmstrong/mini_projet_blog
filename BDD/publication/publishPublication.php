<?php

require('BDD/database.php');




if(isset($_POST['validate'])){
    
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfUser = $_GET['id'];
        $req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute(array($idOfUser));
        $user = $req->fetch();
            if($user['id'] == $_SESSION['id']){
                  if($_FILES["imagee"]["error"] == 4){
                      $P_content = nl2br(htmlspecialchars($_POST['content']));
                        $P_date = date('d/m/Y');
                        $P_id_author = $_SESSION['id'];
                        $P_pseudo_author = $_SESSION['pseudo'];
                        $insertP = $bdd->prepare('INSERT INTO publication(contenu, id_auteur, pseudo_auteur)VALUES(?, ?, ?)');
                        $insertP->execute(
                        array(
                            
                            $P_content, 
                            $P_id_author, 
                            $P_pseudo_author,
                        )
                    );
               
                    }else {
                        
                              $fileName = $_FILES["imagee"]["name"];
                              $fileSize = $_FILES["imagee"]["size"];
                              $tmpName = $_FILES["imagee"]["tmp_name"];
                          
                              $validImageExtension = ['jpg', 'jpeg', 'png'];
                              $imageExtension = explode('.', $fileName);
                              $imageExtension = strtolower(end($imageExtension));
                              if ( !in_array($imageExtension, $validImageExtension) ){
                                echo
                                "
                                <script>
                                  alert('Invalid Image Extension');
                                </script>
                                ";
                              }
                              else if($fileSize > 1000000){
                                echo
                                "
                                <script>
                                  alert('Image Size Is Too Large');
                                </script>
                                ";
                              }
                              else{
                                $newImageName = uniqid();
                                $newImageName .= '.' . $imageExtension;
                          
                                move_uploaded_file($tmpName, 'uplode/imagee/' . $newImageName);
                              
                              }
                  
                    $P_content = nl2br(htmlspecialchars($_POST['content']) );
                    $P_date = date('d/m/Y');
                    $P_id_author = $_SESSION['id'];
                    $P_pseudo_author = $_SESSION['pseudo'];
                    $insertP = $bdd->prepare('INSERT INTO publication(contenu, id_auteur, pseudo_auteur,imagee)VALUES(?, ?, ?, ?)');
                    $insertP->execute(
                        array(
                            
                            $P_content, 
                            $P_id_author, 
                            $P_pseudo_author,
                            $newImageName,
                        )
                    );
                    $successMsg = "Votre Publication a bien été publiée sur le site";
            }}else{
              $errorMsg = "Vous n'avez pas le droit de Poster !";
            }    
    }
  }