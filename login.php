<?php require('BDD/users/loginAction.php'); ?>




<html> 

	<head>
	<link rel="stylesheet" href="style/signup.css">

		<title>Ahmed| Log in</title>
	</head>

	
	<body>
		
		<div id="bar">

			<div style="font-size: 40px;">AHMED</div>
			<a href="signup.php">
			<div id="signup_button">Signup</div>
			</a>
		</div>

		<div id="bar2">
			
			<form method="post">
			<?php if(isset($errorMsg)){ echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>
				Log in to Ahmed<br><br>

				<input name="pseudo" value="" type="text" id="text" placeholder="pseudo"><br><br>
				<input name="password" value="" type="password" id="text" placeholder="Password"><br><br>

				<input type="submit" id="button" name="validate" value="Log in">
				<br><br><br>
                
                <a href="signup.php"><p>Je n'ai pas de compte, je m'inscris</p></a>

			</form>
		</div>

	</body>


</html>