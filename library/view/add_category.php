<?php 

$categoryClass='active';
$listClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$addClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../view/header.php');
include_once ('../controller/book.php');

$categoryObj = new bookController();

if(!empty($_POST)){
	
	$data=$categoryObj->addCategory();
	
}
?>

<body>
	 <form name="addbook" id="addcategory" action="" method="POST">
		  <div class="">
			<div class="row">
				<div class="col-md-2">
					<?php 
					include 'left_menu.php';
					?>		
				</div>
				<div class="col-md-10">
						<table cellpadding="3" cellspacing="3" width="auto" height="100%">
							<tr>
								<td>Category Name : </td>
								<td><input type="text" name="category" id="category" required></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><button type="submit" value="addcategory">Submit</button></td>
							</tr>
						</table>
				</div>
			</div>	
		  </div>
	 </form>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
			$(function(){
			    $("#addcategory").on('submit', function(e) {
			           var catname=$("#catname").val();
			           if (catname==''){
					           	alert ("Category are required.");
					           	return false;
				           }
			    });
		    });
</script>