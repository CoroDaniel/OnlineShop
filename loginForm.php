<?php include "conection.php"; ?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
		<?=navbar()?>
		<div class="login-page">
		  <div class="formLogin">
			 <form action="login.php" method="post" autocomplete="no"> 
			  <div class="log">Login</div><br>
			  <input type="text" name="username" placeholder="username" required/>
			  <input type="password" name="password" placeholder="password" required/>
			  <input type="submit" value="Login">
			  <p class="message">Not registered? <a href="registrationForm.php">Create an account</a></p>
			</form>
		  </div>
		</div>
		<?=footer()?>
	</body>
</html>