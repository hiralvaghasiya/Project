<?php 

$listClass='active';
$addClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../controller/book.php');
include_once ('../view/header.php');

$bookobj = new bookController();

$cid=0;
if (!empty($_GET['cid'])) {
	$cid = $_GET['cid'];
}
$list = $bookobj->listBook($cid);

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
				   <table id="addbook" class="display" >
				   	<thead>
				   	 <tr>
				   	 	<?php if(!$cid){ ?>
				   	 	<td><b><i>Category Name</td>
				   	 		<?php } ?>
				   	 	<td><b><i>Book Name</td>
				   	 	<td><b><i>Book Code</td>
				   	 	<td><b><i>Author</td>
				   	 	<td><b><i>Date Of Arrival</td>
				   	 	<td><b><i>Price</td>
				   	 	<td><b><i>Rack No.</td>
				   	 	<td><b><i>No. Of Books</td>
				   	 	<td><b><i>Subject Code</td>
				   	 	<td><b><i>Action</td>
				   	 		<td></td>
				   	 </tr>
				   	 </thead>
				   	 <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<?php if(!$cid){ ?>
				   	 	<td><?php echo $data['cname']; ?></td>
				   	 	<?php } ?>
				   	 	<td><?php echo $data['bname']; ?></td>
				   	 	<td><?php echo $data['code']; ?></td>
				   	 	<td><?php echo $data['author']; ?></td>
				   	 	<td><?php echo $data['created_date']; ?></td>
				   	 	<td><?php echo $data['price']; ?></td>
				   	 	<td><?php echo $data['rackno']; ?></td>
				   	 	<td><?php echo $data['noofbooks']; ?></td>
				   	 	<td><?php echo $data['subcode']; ?></td>
				   	 	 <td><a href="edit_book.php?id=<?php echo $data['bid']; ?>">Edit</a></td> 
				   	 	<td><a href="delete_book.php?id=<?php echo $data['bid']; ?>">Delete</a></td> 
				   	 </tr>
				   	 <?php } ?>
				   	 </tbody>
				   </table>
            </div>
	   </div>
	</div>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#addbook').DataTable();
} );
</script>

</body>
</html>