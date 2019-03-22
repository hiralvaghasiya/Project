<?php 
include_once ('/controller/login.php');
 
$obj = new login();
    
if (!empty($_POST)){
    $obj->addUser();
}
?>
<!DOCTYPE html>
<html>                           
<head>
  <title>User Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h2>User Registration</h2>
    <form name="adduser" id="adduser" action="" method="POST">
        <table cellpadding="3" cellspacing="3" width="auto" height="100%">
          <tr>
            <td>Email : </td>
            <td><input type="email" name="email" placeholder="Enter Email" id="email" required></td>
          </tr>
          <tr>
            <td>Password : </td>
            <td><input type="password" name="password" placeholder="Password" id="password" required></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" value="adduser">Register</button>
            <a href="index.php">Login</td>
          </tr>
        </table>
        </form>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
      $(function(){
          $("#adduser").on('submit', function(e) {
                 var email=$("#email").val();
                 var password=$("#password").val();
                   if (username==''|| password==''){
                      alert ("All fields are required.");
                      return false;
                   }
          });
        });
</script>