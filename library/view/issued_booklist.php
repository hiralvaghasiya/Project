<?php 

$issuedClass='active';
$addClass=$listClass=$returnClass=$addMemberClass=$listMemberClass=$issueClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../controller/book.php');
include_once ('../view/header.php');


$bookObj=new bookController();
$list=$bookObj->listIssuedBook();

?>

<body>
<div class="">
 		<div class="row">
			<div class="col-md-2">
				<?php 
					include 'left_menu.php';
				?>		
			</div>
			<div class="col-md-9">
				   <table id="issuedbooklist" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<th><b><i>Book Name</th>
				   	 	<th><b><i>Book Code</th>
				   	 	<th><b><i>Member Name</th>
				   	 	<th><b><i>Issue Date</th>
				   	 	<th><b><i>Return Date</th>
				   	 	<th><b><i>Action</th>
				   	 </tr>
				   	</thead>
				   	<tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['name']; ?></td>
				   	 	<td><?php echo $data['book_code']; ?></td>
				   	 	<td><?php echo $data['user_name']; ?></td>
				   	 	<td><?php echo $data['issue_date']; ?></td>
				   	 	<td><?php echo $data['return_date']; ?></td>
				   	 	<td><a class="returnbook" href="#" data-id="<?php echo $data['id']; ?>" data-toggle="modal" data-target="#exampleModal">Return</a> | <a href="change_return_date.php?id=<?php echo $data['id']; ?>">Change Return Date</a></td>
				   	 </tr>
				   	 <?php } ?>
				   	 </tbody>
				   </table>
            </div>
	   </div>
	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="exampleModalLabel">Return Book</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        Are you sure you want to return this book?
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" id="return_book_id">
			        <button type="button" class="btn btn-primary" id="confirm_return">Ok</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      </div>
		    </div>
	  </div>

	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

		  <script type="text/javascript">
			$(document).ready(function() {
				$('#addbook').DataTable();
			   $('#confirm_return').click(function(){
			      window.location = 'return_book.php?id='+$("#return_book_id").val();
			   });
			});

		  </script>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function() {
		$('.returnbook').click(function(){
			$('#return_book_id').val($(this).attr('data-id'));
	   });

	   $('#issuedbooklist').DataTable();
	});
</script>