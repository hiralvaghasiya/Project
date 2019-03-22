<?php 

$issuedClass='active';
$listClass=$addMemberClass=$listMemberClass=$noticeClass='';

include_once ('../view/user_header.php');
include_once ('../controller/book.php');

$bookObj=new bookController();
$list=$bookObj->userIssuedBookList();

?>

<body>
<div class="">
		<div class="row">
			<div class="col-md-2">
				<?php 
					include 'user_left_menu.php';
				?>		
			</div>
			<div class="col-md-9">
				   <table id="issuedbooklist" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<th><b><i>Book Name</th>
				   	 	<th><b><i>Book Code</th>
				   	 	<th><b><i>Issue Date</th>
				   	 	<th><b><i>Return Date</th>
				   	 </tr>
				   	 </thead>
				   	 <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['name']; ?></td>
				   	 	<td><?php echo $data['code']; ?></td>
				   	 	<td><?php echo $data['issue_date']; ?></td>
				   	 	<td><?php echo $data['return_date']; ?></td>
				   	 </tr>
				   	 <?php } ?>
				   	 </tbody>
				   </table>
            </div>
	   </div>
	</div>

</body>


<script type="text/javascript">
$(document).ready(function() {
   $('#issuedbooklist').DataTable();
});
</script>