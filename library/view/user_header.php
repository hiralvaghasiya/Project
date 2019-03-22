<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>list of books</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<?php 
$data=$_SESSION['image_path'];
?>
<div style="width: 100%; height: 50px; margin: 20px;">
		<div class="col-md-10">
			<span style="font-size: 30px;">Library Management System</span>
		</div>
	
		<div class="col-md-2">
			<a href="manage_profile.php"><span style=""><?php echo $_SESSION['fname']; ?></span></a>
			<a href="manage_profile.php"><img width="50" height="50" src="<?php echo '../media/image/profile/'.$_SESSION['image_path']; ?>"></a>
			&emsp;<a href="user_logout.php" style="text-align: right;">Logout</a>
		</div>
</div>
</html>