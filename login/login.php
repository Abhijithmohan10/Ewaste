<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
require_once('header.php');
?>

<body>
	<h1> Login Form</h1>
	<div class="w3layouts">
		<div class="signin-agile">
			<h2>Log In</h2>
			<form action="codes/login_exe.php" method="post"> 
				<input type="text" name="username"placeholder="Username" required="">
				
				<input type="password" name="password" class="password" placeholder="Password" required="">
				
					
						<input type="submit" name="submit" value="SUBMIT">
					
				
				
				<div class="clear"></div>
				
				<a href="../index.php">home</a><br>
				<a href="forgot_password.php">forgot password</a>
			</form>
		</div>
		<div class="register-right">
			<img src="images/1.png" alt="images">
		</div>
		<div class="clear"></div>
	
	
<?php
require_once('footer.php');
?>