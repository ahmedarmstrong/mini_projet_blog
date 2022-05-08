<?php

	
    require('BDD/users/showuser.php');   
	require('BDD/users/securityAction.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/st.css">
</head>  
<body style="font-family: tahoma; background-color: #d0d8e4;"> 
<?php include 'includes/head.php' ?>
        <div id="bar2">
	                    <form method="post" >	
                        <?php if(isset($errorMsg)){ echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>

                        <label>Pseudo :</label>
						<label><?php echo $user_pseudo ?></label><br><br><br>
                        <label>Prenom :</label>
						<label><?php echo $user_firstname ?></label><br><br><br>
                        <label>Nom :</label>
						<label><?php echo $user_lastname ?></label><br><br><br>
                        <label>Gender :</label>
						<label><?php echo $user_gender?></label><br><br><br>
                        <label>Email :</label>
						<label><?php echo $user_email ?></label><br><br><br>
                            <?php if ($user_id == $_SESSION['id']):?>
                                <a href="editProfile.php?id=<?php echo $user_id ?>" id="post_button"  >Modifier</a>
                            <?php else: ?>
                            <?php endif ?>
                </form>
        </div>
        
		</body> 
        
</html>