<?php 

$addMemberClass='active';
$listClass=$issueClass=$addClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../view/header.php');
include_once ('../controller/member.php');

$obj=new memberController();
if($_POST)
{

 $obj->addmember();
}
	?>

<body>
<div class="">
	<div class="row">
		<div class="col-md-3">
			<?php 
			include 'left_menu.php';
			?>		
		</div>
		<div class="col-md-9">
		<form name="addmember" id="addmember" action="" method="POST">
				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>First Name : </td>
						<td><input type="text" name="firstname" id="firstname" required></td>
					</tr>
					<tr>
						<td>Last Name : </td>
						<td><input type="text" name="lastname" id="lastname" required></td>
					</tr>
					<tr>
						<td>Age :</td>
						<td><input type="text" name="age" id="age" required></td>
					</tr>
					<tr>
						<td>Address :</td>
						<td><textarea row="4" cols="10" id="address" name="address"></textarea></td>
					</tr>
					<tr>
						<td>Gender :</td>
						<td><input type="radio" name="gender" value="male">Male
							<input type="radio" name="gender" value="female">Female</td>
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
			    $("#addmember").on('submit', function(e) {
			           var firstname=$("#firstname").val();
			           var lastname=$("#lastname").val();
			           var Age=$("#Age").val();
			           var Address=$("#Address").val();
			           var gender=$("#gender").val();
			           if (firstname==''|| lastname==''|| Age==''|| Address==''|| gender==''){
					           	alert ("All fields are required.");
					           	return false;
				           }
			    });
		    });
		</script>