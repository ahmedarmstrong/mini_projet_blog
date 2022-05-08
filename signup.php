<?php require('BDD/users/signupAction.php'); ?>






<html> 

	<head>
	<script src="includes/js.js"></script>
	<link rel="stylesheet" href="style/signup.css">

		<title>Ahmed | Signup</title>
	</head>

	
	<body >
		
		<div id="bar">

			<div style="font-size: 40px;">AHMED</div>
			<a href="login.php">
			<div id="signup_button">Log in</div>
			</a>
			<span style="color: red;" class="text-center" id="erreur"></span>
		</div>

		<div id="bar2">
			
			Sign up to Ahmed<br><br>

			<form method="post" id="inscription">
			<?php if(isset($errorMsg)){ echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>
				<input value="" name="pseudo" type="text" id="text" placeholder="pseudo"><br><br>
				<input value="" name="lastname" type="text" id="text" placeholder="Nom"><br><br>
                <input value="" name="firstname" type="text" id="text" placeholder="Prenom"><br><br>
				<select id="text" name="gender">
					
					<option>Male</option>
					<option>Female</option>

				</select>
				<br><br>
				<input value="" name="email" type="email" id="text" placeholder="Email"><br><br>
				
				<input name="password" type="password" id="text" placeholder="Password"><br><br>
				<input name="password2" type="password" id="text" placeholder="Retype Password"><br><br>

				<input type="submit" id="button" name="validate" value="inscription">
				
				
                <a href="login.php"><p>J'ai déjà un compte, je me connecte</p></a>
			</form>
			<span style="color: red;" class="text-center" id="erreur"></span>

		</div>
		
	</body>

	

</html>