<?php 

$requestbookClass='active';
$addClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass=$listClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../controller/book.php');
include_once ('../view/header.php');

$bookobj = new bookController();

$list = $bookobj->issuedbook();
?>

<body>
<div class="">
    <div class="row">
			<div class="col-md-2">
				<?php 
					include 'left_menu.php';
				?>		
			</div>
			<div class="col-md-10">
				<!-- <form name="addbook" action="../controller/book.php" method="POST"> -->
				   <table id="addbook" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<td><b><i>Member Name</td>
				   	 	<td><b><i>Book Name</td>
				   	 	<td><b><i>Author</td>
				   	  </tr>
				   	  </thead>
				   	  <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['user_name']; ?></td>
				   	 	<td><?php echo $data['book']; ?></td>
				   	 	<td><?php echo $data['author']; ?></td>
				   	 	<!-- <td><a href="edit_book.php?id=<?php echo $data['id']; ?>">Edit</a></td> -->
				   	 	<!-- <td><a href="delete_book.php?id=<?php echo $data['id']; ?>">Delete</a></td> -->
				   	 </tr>
				   	 <?php } ?>
				   	 </tbody>
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