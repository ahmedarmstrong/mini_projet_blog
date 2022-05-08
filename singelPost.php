<?php

	
  require('BDD/users/showuser.php');   
	require('BDD/users/securityAction.php');
  require('BDD/publication/commentaire.php'); 
	require('BDD/publication/showPostContenu.php'); 
  require('BDD/publication/showAllAnswer.php');
	require('BDD/publication/showAllPublication.php'); 
	//require('BDD/publication/partagerPost.php'); 

	  
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="style/style.css">
	<title>Post</title>
</head>
<body>
<?php include 'includes/head.php'; ?>
<div class="container">
	<div class="col-4">
        <div class="panel panel-default">
            <div class="panel-body">
               <section class="post-heading">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="mediaa">
                              <div class="media-left">
                                
                                <?php 
                                    if(!empty($usersInfos['avatar']))
                                    {
                                      ?>
                                      <img  src="uplode/avatars/<?php echo $user_avatar?>" style="width: 75px; margin-right:4px;border-radius: 50%;"><br/>
                                    <?php 
                                    }else
                                    {
                                      ?>
                                      <img style="width: 75px; margin-right:4px;border-radius: 50%;" src="image/user_male.jpg" >
                                      <?php
                                    } 
                                    
                                  ?>                                
                              </div>
                              <div class="media-body">
                                <a href="profile.php?id=<?=$post_id_auteur ?>" class="anchor-username"><h4 class="media-heading"><?= $post_pseudo_auteur?></h4></a> 
                                <p style="font-size:1.7rem;"><?=$post_publication_date ?></p><br>
                              </div>
                            </div>
                        </div>
                         <div class="col-md-1">
                             <a href="BDD/publication/suprimerpost.php?id=<?= $idOfPost ?>"><i class="glyphicon glyphicon-chevron-down"></i>suprimer</a>
                             
                         </div>
                    </div>             
               </section>
               <section class="post-body">
               <br/><br/><p style="font-size:2rem; color:black;"><?=$post_content  ?></p>	<br>
               <?php 
				          if(!empty($PostInfos['imagee']))
				        {
					      ?>			
								  <img src="uplode/imagee/<?=$post_imagee?>" style="width: 100px; "><br/>
											
									
							 
								<?php
				        } 
				      ?>
               </section>
               <section class="post-footer">
                   <hr>
                   <div class="post-footer-option container">
                        <ul class="list-unstyled">
                            <li><a href="BDD/publication/likess.php?t=1&id=<?= $idOfPost ?>"><i class="glyphicon glyphicon-thumbs-up"></i> Like (<?= $likes ?>)</a></li>  
                            <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                            <li><a href="BDD/publication/partagerPost.php?id=<?= $idOfPost ?>"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
                        </ul>
                   </div>
                   <div class="form-floating mb-3" >
                      <form method="post" enctype="multipart/form-data">
                        <textarea class="form-control" id="floatingInput" name="answer" placeholder="post a commentaire"></textarea>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <input class="btn btn-primary btn-sm" style="float: right;margin:10px;" type="submit" name="validat" value="post">
                         </div>
                      </form>
                    </div>
                    <br><br><p style="font-size:2.5rem;color:black;">Vos commentaire :</p><br>
                   <div class="post-footer-comment-wrapper">
                       <div class="comment-form">
                           
                       </div>
                       <?php 
                                while($answer = $getAllAnswersOfPost->fetch()){
                                    ?>
                                   
                       <div class="comment">
                       
                            <div class="media">
                              <div class="media-left">
                              <?php 
                                    if(!empty($usersInfos['avatar']))
                                    {
                                      ?>
                                      <img  src="uplode/avatars/<?= $user_avatar?>" style="width: 75px; margin-right:4px;border-radius: 50%;"><br/>
                                    <?php 
                                    }else
                                    {
                                      ?>
                                      <img style="width: 75px; margin-right:4px;border-radius: 50%;" src="image/user_female.jpg" >
                                      <?php
                                    } 
                                    
                                  ?>
                              </div>
                              <div class="media-body">
                                <a href="profile.php?id=<?= $answer['id_auteur']; ?>" class="anchor-username"><h4 class="media-heading"><?= $answer['pseudo_auteur']; ?></h4></a> 
                                <p style="font-size:1.3rem;"><?= $answer['datee']; ?></p><br>
                                <p style="font-size:2rem;color:black;"><?= $answer['contenu']; ?></p><br><br><br>
                              </div>
                            </div>
                            
                       </div>
                       
                       <?php
                                }
                            ?>
                   </div>
               </section>
            </div>
        </div>   
	</div>
</div>
</body>
</html>