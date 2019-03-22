<?php 

$addClass='active';
$listClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../view/header.php');
include_once ('../controller/book.php');

$categoryObj = new category();
$categories=$categoryObj->getCategoryList();

$bookObj=new bookController();

if(!empty($_POST)){
	$data=$bookObj->addBooks();
}


?>

<body>
<div class="">
	<div class="">
		<div class="col-md-3">
			<?php 
			include 'left_menu.php';
			?>		
		</div>
		<div class="col-md-9">
		<form name="addbook" id="addbook" action="" method="POST">
				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>Book Catogery : </td>
						<td><select>
							<option>Select Here</option>
								<?php  foreach($categories as $value){ ?>
							<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
								<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td>Book Name : </td>
						<td><input type="text" name="bookname" id="bookname" required></td>
					</tr>
					<tr>
						<td>Book Code :</td>
						<td><input type="text" name="bookcode" id="bookcode" required></td>
					</tr>
					<tr>
						<td>Auther :</td>
						<td><input type="text" name="auther" id="auther" required></td>
					</tr>
					<tr>
						<td>Date Of Arrival :</td>
						<td><input type="date" name="date" id="date" required></td>
					</tr>
					<tr>
						<td>Price :</td>
						<td><input type="text" name="price" id="price" required></td>
					</tr>
					<tr>
						<td>Rack No. :</td>
						<td><input type="text" name="RackNo" id="RackNo" required></td>
					</tr>
					<tr>
						<td>No. Of Books :</td>
						<td><input type="text" name="NoOfBook" id="NoOfBook" required></td>
					</tr>
					<tr>
					    <td>Subject Code :</td>
						<td><input type="text" name="subjectcode" id="subjectcode" required></td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
			$(function(){
			    $("#addbook").on('submit', function(e) {
						// e.preventDefault();
			           var bookname=$("#bookname").val();
			           var bookcode=$("#bookcode").val();
			           var auther=$("#auther").val();
			           var date=$("#date").val();
			           var price=$("#price").val();
			           var RackNo=$("#RackNo").val();
			           var NoOfBook=$("#NoOfBook").val();
			           var subjectcode=$("#subjectcode").val();
			           if (bookname==''|| bookcode==''|| auther==''|| date==''|| price=='' || RackNo=='' || NoOfBook== '' || subjectcode==''){
					           	alert ("All fields are required.");
					           	return false;
				           }
			    });
		    });

</script>