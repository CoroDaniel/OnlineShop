<?php include "conection.php"; ?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
		<?=navbar()?>
		<div class="register-page">
			<div class="form">
			  <form action="registration.php" method="post" autocomplete="off">
				<div class="reg">Sign Up</div><br>
				<input type="text" name="username" placeholder="Username" required/>
				<input type="email" name="email" placeholder="Email" required/>
				<input type="password" name="password" placeholder=" Password" required/>
				<input type="password" name="confirm_password" placeholder="Confirm Password" required/>
				<input type="submit" value="Register">
				<p class="message">Already registered? <a href="loginForm.php">Login</a></p>
			  </form>
			</div>
		</div>
		<?=footer()?>
	</body>
</html>