<?php

	
  
require('BDD/users/signupAction.php'); 
 

require('BDD/users/showuser.php'); 
require('BDD/publication/showMyPublication.php');
require('BDD/publication/showPostContenu.php'); 
require('BDD/publication/editPost.php'); 
require('BDD/publication/editeurPost.php');  

	  
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="style/style.css">
	<title>Edit Post</title>
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
                                <a href="profile.php?id=<?=$post_id_auteur ?>" class="anchor-username"><h4 class="media-heading"><?= $post_pseudo_auteur?></h4></a> 
                                <p style="font-size:1.7rem;"><?=$post_publication_date ?></p><br>
                              </div>
                            </div>
                        </div>
                        
                    </div>             
               </section>
               <section class="post-body">
               <br/><br/><p style="font-size:2rem; color:black;"><?=$post_content  ?></p>	<br>
               <?php 
				          if(!empty($PostInfos['imagee']))
				        {
					      ?>			
								  <img src="uplode/imagee/<?=$post_imagee?>" style="width: 100px; ">
											
											
									
							 
								<?php
				        } 
				      ?>
               </section>
               <section class="post-footer">
                   <hr>
                   
                   <div class="form-floating mb-3" >
                      <form method="post" >
                        <textarea class="form-control" id="floatingInput" name="content" ></textarea> <br>
                        <input type="file" name="imagee" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> 
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <input class="btn btn-primary btn-sm" style="float: right;margin:10px;" type="submit" name="validatt" value="post">
                         </div>
                      </form>
                    </div>
                    
               </section>
            </div>
        </div>   
	</div>
</div>
</body>
</html>