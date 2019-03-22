<?php 

$issueClass='active';
$addClass=$listClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../view/header.php');
include_once ('../controller/book.php');

$bookObj=new bookController();

if(!empty($_POST)){
	$data=$bookObj->issueBooks();
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
		<form name="issuebook" id="issuebook" action="" method="POST">
				<table cellpadding="3" cellspacing="3" width="auto" height="100%">
					<tr>
						<td>Book Code :</td>
						<td>
							<!-- <div id="the-basics"> -->
							<input type="text" name="bookcode" id="bookcode" list="booklist" required autocomplete="off" >
							<datalist id="booklist">
							</datalist>
						<!-- </div> -->
					</td>
					</tr>
					<tr>
						<td>Member Code :</td>
						<td><input type="text" name="membername" id="membername" list="memberlist" required autocomplete="off"></td>
						<datalist id="memberlist">
					    </datalist>
					</tr>
					<tr>
						<td>Issue Date :</td>
						<td><input type="date" name="issuedate" id="issuedate" value="<?php echo date("Y-m-d"); ?>" required readonly></td>
					</tr>
					<tr>
						<td>Due Date :</td>
						<td><input type="date" name="duedate" id="duedate" required ></td>
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

    <link rel="stylesheet" href="../media/css/typehead.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

var book_name = [];

	$(function(){

	    $("#addbook").on('submit', function(e) {
	           var bookcode=$("#bookcode").val();
	           var membername=$("#membername").val();
	           var issuedate=$("#issuedate").val();
	           var duedate=$("#duedate").val();
	           if (bookcode==''|| bookcode==''|| membername==''|| issuedate==''|| duedate==''){
			           	alert ("All fields are required.");
			           	return false;
		           }
	    });

     	$("#bookcode").on('keypress', function(e) {

	     	$.ajax({
		      	url:"getbooklist.php",
		      	type: "POST",
		      	cache: false,
		  		data: {"id" : $('#bookcode').val()},
		      	success: function(data){
		      		data = JSON.parse(data);

		      		$('#booklist').empty();		      		
		      		$.each( data, function( key, value ) {
	     	          $('#booklist').append("<option value='" + key + "'>" + value + "</option>");
					});
				}
			});
 	
    	});

    	$("#membername").on('keypress', function(e) {

	     	$.ajax({
		      	url:"getmemberlist.php",
		      	type: "POST",
		      	cache: false,
		  		data: {"id" : $('#membername').val()},
		      	success: function(data){
		      		data = JSON.parse(data);

		      		$('#memberlist').empty();		      		
		      		$.each( data, function( key, value ) {
	     	          $('#memberlist').append("<option value='" + key + "'>" + value + "</option>");
					});
				}
			});
 	
    	});
    		var dtToday = new Date();
		    var month = dtToday.getMonth() + 1;
		    var day = dtToday.getDate();
		    var year = dtToday.getFullYear();
		    if(month < 10)
		        month = '0' + month.toString();
		    if(day < 10)
		        day = '0' + day.toString();
		    
		    var maxDate = year + '-' + month + '-' + day;
		    $('#duedate').attr('min', maxDate);
	
    });
</script>