<?php 
require('BDD/users/signupAction.php'); 
require('BDD/users/showuser.php');  
require('BDD/users/editUser.php');
require('BDD/publication/uploadPhoto.php');?>






<html> 

	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/st.css">
	<title>Ahmed | Signup</title>
	</head>

	
		
	

	<body style="font-family: tahoma;background-color: #e9ebee;">
	<?php include 'includes/head.php'; ?>

		<div id="bar2">
         <h1>Modifier mon profil</h1>
         <div >
            <form method="POST" action="" enctype="multipart/form-data">
				<label>Nom :</label>
               <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user_lastname ?>" /><br /><br />
				<label>Prenom :</label>
               <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user_firstname ?>" /><br /><br />
				<label>Pseudo :</label>
               <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user_pseudo ?>" /><br /><br />
               Gender : <select id="text" name="newgender">
                <option><?php echo $user_gender?></option>
				<option>Male</option>
				<option>Female</option>
				</select><br /><br />
			   <label>Mail :</label>
               <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user_email ?>" /><br /><br />
               <label>Mot de passe :</label>
               <input type="password" name="newmdp" placeholder="Mot de passe"/><br /><br />
			   <label>Avatar</label>
				<input type="file" name="avatar"><br /><br />
               <input type="submit"  value="Mettre à jour mon profil !" />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>

	</body>


</html>