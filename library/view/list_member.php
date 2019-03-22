<?php 

$listMemberClass='active';
$addClass=$issueClass=$addMemberClass=$listClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../controller/member.php');

$memberobj = new memberController();

$list = $memberobj->listMember();

?>
<html>
<head>
	<title>list of members</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>
<body>
<div class="">
	<?php 
		include 'header.php';
	?>
  		<div class="row">
			<div class="col-md-2">
				<?php 
					include 'left_menu.php';
				?>		
			</div>
			<div class="col-md-10">
				<!-- <form name="addmember" action="../controller/member.php" method="POST"> -->
				   <table id="addmember" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<td><b><i>First Name</td>
				   	 	<td><b><i>Last Name</td>
				   	 	<td><b><i>Age</td>
				   	 	<td><b><i>Address</td>
				   	 	<td><b><i>Gender</td>
				   	 	<td><b><i>Action</td>
				   	 		<td></td>
				   	 </tr>
				   	 </thead>
				   	 <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['fname']; ?></td>
				   	 	<td><?php echo $data['lname']; ?></td>
				   	 	<td><?php echo $data['age']; ?></td>
				   	 	<td><?php echo $data['address']; ?></td>
				   	 	<td><?php echo $data['gender']; ?></td>
				   	 	<td><a href="edit_member.php?id=<?php echo $data['id']; ?>">Edit</a></td>
				   	 	<td><a href="delete_member.php?id=<?php echo $data['id']; ?>">Delete</a></td>
				   	 </tr>
				   	 <?php } ?>
				   	 </tbody>
				   </table>
                <!-- </form> -->
            </div>
	   </div>
	</div>
</body>
</html>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
	</script>

<script type="text/javascript">
	$(document).ready(function() {
     $('#addmember').DataTable();
} );
</script>