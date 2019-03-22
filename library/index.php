<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR.'controller/login.php');

 if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['position'])){

	

	$user = new login();

	if($_POST['position'] == "Admin"){
		$user->checkLogin();
	}else{
		$user->userLogin();
	}
}
?>
<html>
<head>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container">
<?php 
		if(!empty($_SESSION['error_msg'])){
		echo $_SESSION['error_msg'];
		$_SESSION['error_msg'] = '';
		}
?>
<h2>Login</h2>
<form action="" method="POST" name="loginForm">
<div class="form-group">
<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required="">
</div>
<div class="form-group">
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
</div>
<div class="form-group">
<select name="position" id="position" class="form-control" type="select">
		<option>--Select Position--</option>
		<option>Admin</option>
		<option>User</option>
</select>
</div>
<div class="form-group">
<input type="submit" name="loginsubmit" id="login_btn" class="btn-primary" value="submit">
</div>
</form>
<a href="user_register.php">Register</a>
</div>
</body>
</html>
