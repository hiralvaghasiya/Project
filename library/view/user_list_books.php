<?php 
$listClass='active';
$addMemberClass=$issuedClass=$requiestClass=$noticeClass='';


include_once ('../view/user_header.php');
include_once ('../controller/book.php');

$bookobj = new bookController();

$list = $bookobj->allBookList();
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
				   <table id="addbook" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<td><b><i>Book Name</td>
				   	 	<td><b><i>Book Code</td>
				   	 	<td><b><i>Author</td>
				   	 	<td><b><i>Date Of Arrival</td>
				   	 	<td><b><i>Price</td>
				   	  	<td><b><i>No. Of Books</td>
				   	 	<td><b><i>Subject Code</td>
				   	 </tr>
				   	 </thead>
				   	 <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['name']; ?></td>
				   	 	<td><?php echo $data['code']; ?></td>
				   	 	<td><?php echo $data['author']; ?></td>
				   	 	<td><?php echo $data['created_date']; ?></td>
				   	 	<td><?php echo $data['price']; ?></td>
				  	 	<td><?php echo $data['noofbooks']; ?></td>
				   	 	<td><?php echo $data['subcode']; ?></td>
				   	 </tr>
				   	 <?php } ?>
				   	 </thead>
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
     $('#addbook').DataTable();
} );
</script>