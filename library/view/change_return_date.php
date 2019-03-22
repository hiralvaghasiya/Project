<?php 

$returnClass='active';
$addClass=$listClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass='';

include_once ('../controller/book.php');


$bookObj=new bookController();

 if(!empty($_POST)){
 	$data=$bookObj->changeReturnBookDate();
 }
 else{
	// $data=$bookObj->changeReturnDate();
	$data=$bookObj->getIssueBookData($_GET['id']);
}

	// print_r($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Return Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<?php 
		include 'header.php';
	?>
<div class="row">
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php 
			include 'left_menu.php';
			?>		
		</div>
		<div class="col-md-9">
		<form name="addbook" id="addbook" action="" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>Book Code : </td>
						<td>
							<span><?php echo $data['book_code']; ?></span>
						</td>
					</tr>
					<tr>
						<td>Book Name :</td>
						<td>
							<span><?php echo $data['name']; ?></span>
						</td>
					</tr>
					<tr>
						<td>Member Name :</td>
						<td>
							<span><?php echo $data['member_id']; ?></span>
						</td>
					</tr>
					<tr>
						<td>Issue Date :</td>
						<td><span><?php echo $data['issue_date']; ?></span></td>
					</tr>
					<tr>
						<td>Return Date :</td>
						<td><input type="date" name="returndate" id="returndate" required value="<?php echo $data['return_date']; ?>"></td>
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

