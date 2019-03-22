<?php 
include_once ('/controller/login.php');
 
$obj = new login();
    
if (!empty($_POST)){
    $obj->userLogin();
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
<h2>User Login</h2>
<form action="" method="POST" name="loginForm" id="loginForm">
<div class="form-group">
<input type="text" name="username" id="username" class="form-control" placeholder="username" required="">
</div>
<div class="form-group">
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
</div>
<div class="form-group">
<input type="submit" name="loginsubmit" id="login_btn" class="btn-primary" value="submit">
<a href="user_register.php">Register</a>
</div>
</form>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
      $(function(){
          $("#loginForm").on('submit', function(e) {
                 var username=$("#username").val();
                 var password=$("#password").val();
                   if (username==''|| password==''){
                      alert ("All fields are required.");
                      return false;
                   }
          });
        });
</script>
