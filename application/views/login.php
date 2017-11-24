<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login</h2>
	<form action="<?php echo base_url('index.php/login_con/cek_login') ?>" method="post">
		<label>Username</label>
		<input type="text" name="username"><br>
		<label>Password</label>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>