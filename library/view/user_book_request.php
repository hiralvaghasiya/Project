<?php 

$requestClass='active';
$listClass=$addMemberClass=$issuedClass=$noticeClass='';

include_once ('../controller/book.php');
include_once ('../view/user_header.php');

$bookObj=new bookController();

if(!empty($_POST)){

$list=$bookObj->addBook();

}
?>

<body>
	 <form name="addbook" id="addbook" action="" method="POST">
		  <div class="">
		   		<div class="row">
					<div class="col-md-2">
						<?php 
							include 'user_left_menu.php';
						?>		
					</div>
					<div class="col-md-10">
						   <table id="issuedbooklist" class="display" width="auto" height="100%">
						   	<tr>
								<td>Book Name : </td>
								<td><input type="text" name="book" id="book" required></td>
							</tr>
							<tr>
								<td>Author :</td>
								<td><input type="text" name="author" id="author" required></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><button type="submit" value="addbook">Submit</button></td>
							</tr>
						   </table>
		            </div>
			   </div>
		  </div>
	 </form>
</body>


