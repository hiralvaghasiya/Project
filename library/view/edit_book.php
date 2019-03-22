<?php 
include_once ('../controller/book.php');


$bookObj=new bookController();

if(!empty($_POST['id'])){
	
	$data=$bookObj->editBook();
	
}else{
	$id=$_GET['id'];
	$data=$bookObj->getBook($id);
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
		<form name="addbook" action="" method="POST">
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>Book Name : </td>
						<td><input type="text" name="bookname" value="<?php echo $data['name']; ?>"></td>
					</tr>
					<tr>
						<td>Book Code :</td>
						<td><input type="text" name="bookcode" value="<?php echo $data['code']; ?>"></td>
					</tr>
					<tr>
						<td>Auther :</td>
						<td><input type="text" name="auther" value="<?php echo $data['author']; ?>"></td>
					</tr>
					<tr>
						<td>Date Of Arrival :</td>
						<td><input type="date" name="date" value="<?php echo $data['created_date']; ?>"></td>
					</tr>
					<tr>
						<td>Price :</td>
						<td><input type="text" name="price" value="<?php echo $data['price']; ?>"></td>
					</tr>
					<tr>
						<td>Rack No. :</td>
						<td><input type="text" name="RackNo" value="<?php echo $data['rackno']; ?>"></td>
					</tr>
					<tr>
						<td>No. Of Books :</td>
						<td><input type="text" name="NoOfBook" value="<?php echo $data['noofbooks']; ?>"></td>
					</tr>
					<tr>
					    <td>Subject Code :</td>
						<td><input type="text" name="subjectcode" value="<?php echo $data['subcode']; ?>"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><button type="submit" value="addbook">Submit</button></td>
					</tr>
				</table>
		    </form>
		</div>
	</div>
</div>




</body>
</html>