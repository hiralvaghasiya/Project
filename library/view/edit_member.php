<?php 
include_once ('../controller/member.php');
$listMemberClass='active';
$listClass=$issueClass=$returnClass=$addClass=$addMemberClass='';


$memberObj=new memberController();

if(!empty($_POST['id'])){
	
	$memberObj->editMember();
	
}else{
	$id=$_GET['id'];
	$data=$memberObj->getMember($id);
}
// print_r($data);
// $data=$bookObj->editBook($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row">
	<h3>Library Management System</h3>
</div>
	<div class="row">
		<div class="col-md-3">
			<?php 
			include 'left_menu.php';
			?>		
		</div>
		<div class="col-md-9">
		<form name="addmember" action="" method="POST">
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>First Name : </td>
						<td><input type="text" name="firstname" value="<?php echo $data['fname']; ?>"></td>
					</tr>
					<tr>
						<td>Last Name :</td>
						<td><input type="text" name="lastname" value="<?php echo $data['lname']; ?>"></td>
					</tr>
					<tr>
						<td>Age :</td>
						<td><input type="text" name="age" value="<?php echo $data['age']; ?>"></td>
					</tr>
					<tr>
						<td>Address :</td>
						<td><textarea rows="4" cols="10" name="address"><?php echo $data['address']; ?></textarea></td>
					</tr>
					<tr>
						<td>Gender :</td>
						<?php 
							if(!empty($data['gender']) && $data['gender'] == 'female'){
								$fcheck='checked';
								$mcheck='';
							}
							else {
								$mcheck='checked';
								$fcheck='';
							}
						?>
						<td><input type="radio" name="gender" value="male" <?php echo $mcheck ?>>Male
						<input type="radio" name="gender" value="female" <?php echo $fcheck ?>>Female</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><button type="submit" value="addmember">Submit</button></td>
					</tr>
				</table>
		    </form>
		</div>
	</div>
</div>




</body>
</html>