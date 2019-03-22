<?php 

$listClass='active';
$addClass=$issueClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$noticeClass=$profileClass='';

include_once ('../controller/book.php');
include_once ('../view/header.php');

$categoryobj = new bookController();

$list = $categoryobj->listCategory();

?>
<!DOCTYPE html>

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
				   	 	<td><b><i>Category Name</td>
				   	 	<td><b><i>Action</td>
				   	 		<td></td>
				   	 </tr>
				   	 </thead>
				   	 <tbody>
				   	 	<?php 
						  foreach ($list as $data) {
						?>
				   	 <tr>
				   	 	<td><?php echo $data['name']; ?></td>
    			   	 	 <td><a href="list_books.php?cid=<?php echo $data['id']; ?>">View Books</a></td>
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