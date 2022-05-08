<?php

	
require('BDD/users/showuser.php');   
require('BDD/users/securityAction.php');
require('BDD/publication/publishPublication.php');
require('BDD/publication/showMyPublication.php'); 
require('BDD/publication/getInfoLike.php');









?>

<!DOCTYPE html>
<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="style/style.css">
		<title>Profile</title>
	</head>

	

	<body style="font-family: tahoma; background-color: #d0d8e4;">

	<?php include 'includes/head.php'; ?>
 
 		

		<!--cover area-->
		<div style="width: 1050px;margin:auto;min-height: 400px;">
			
			<div style="background-color: white;text-align: center;color: #405d9b">

					

				<img src="image/mountain.jpg" style="width:100%;">


				
					
				<?php 
				if(!empty($usersInfos['avatar']))
				{
					?>
					<img id="profile_pic" src="uplode/avatars/<?php echo $user_avatar?>"><br/>
				<?php 
				}else
				{
					?>
					<img id="profile_pic" src="image/user_male.jpg" >
					<?php
				} 
				
				?>
					

				</span>
				<br>
					<div method="get" style="font-size: 20px;color: black;">
						<a href="profile.php?id=<?php echo $user_id ?>">
			
							<span style="font-size:25px;"><?=$user_firstname. " " . $user_lastname?></span>
							<br><span style="font-size:12px;">@<?=$user_pseudo?></span>
						</a>
					</div>
				<br>
				


				<a href="index.php?id=<?php echo $user_id ?>" style="font-size:1.7rem;"><div id="menu_buttons">Accueil</div></a>
				<a href="settings.php?id=<?php echo $user_id ?>" style="font-size:1.7rem;"><div id="menu_buttons">A propos</div></a>
				<br><br>
				
			</div>

			<!--post area-->
			<br><br>
	 		<div style="border:solide thin #aaa; padding: 10px;background-color:white;">
			 <form method="post" autocomplete="off" enctype="multipart/form-data">
					<textarea name="content" placeholder="whats on your minde?"></textarea>
					<input type="file" name="imagee" id = "image" accept=".jpg, .jpeg, .png" value=""> <br>
					<input id="post_button" type="submit" name="validate" value="post">
				</form>
			 </div>
			 
			 			<?php 

							while($Pub = $getAllMyPub->fetch()){
						?>

						<div >
							<br><br>
							<div class="col-6">
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
														<a href="profile.php?id=<?php echo $user_id ?>" class="anchor-username"><h4 class="media-heading"><?php echo $user_firstname. " " .$user_lastname?></h4></a> 
														<p style="font-size:1.7rem;"><?php echo $Pub['date_publication'];  ?></p><br>
													</div>
													</div>
												</div>
												<div class="col-md-1">
												<?php if ($Pub['id_auteur'] == $_SESSION['id']):?>
													<a  href="BDD/publication/suprimerpost.php?id=<?= $Pub['id']; ?>"><i  class="glyphicon glyphicon-chevron-down"></i>suprimer</a>
													<?php else: ?>
														
														<?php endif ?>
												</div>
											</div>             
									</section>
									<section class="post-body">
									<br/><br/><p style="font-size:2rem; color:black;"><?php echo $Pub['contenu'];  ?></p>	<br>
									<?php 
												if(!empty($Pub['imagee']))
												{
												?>			
														<img src="uplode/imagee/<?php echo $Pub['imagee'];?>" style="width: 100px; "><br/>
																	
															
													
														<?php
												} 
											?>
											
									</section>
									<section class="post-footer">
										<hr>
										<div class="post-footer-option container">
												<ul class="list-unstyled">
													<li><a href="BDD/publication/likess.php?t=1&id=<?= $Pub['id']; ?>"><i class="glyphicon glyphicon-thumbs-up"></i> Like (<?= $likess ?>) </a></li>  
													<li><a href="singelPost.php?id=<?= $Pub['id']; ?>"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
													<?php if ($Pub['id_auteur'] == $_SESSION['id']):?>
													<li><a href="edittPost.php?id=<?= $Pub['id']; ?>"><i class="glyphicon glyphicon-comment"></i> modifer</a></li>
													<?php else: ?>
														
														<?php endif ?>
													<li><a href="BDD/publication/partagerPost.php?id=<?= $Pub['id']; ?>"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
												</ul>
										</div>			
               </section>
            </div>
        </div>   
	</div>
</div>
						<br>
						<?php
					}

				?>
					
		</div>

	</body>
	<?php include 'includes/footer.php'; ?>
</html>

