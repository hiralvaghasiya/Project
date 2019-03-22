<?php 
 
$noticeClass='active';
$listClass=$addMemberClass=$issuedClass=$requestClass='';


include_once ('../view/user_header.php');
include_once ('../controller/common.php');
include_once ('../controller/book.php');

$noticeObj= new common();
$data = $noticeObj->listNotice();

$bookObj= new bookController();
$bookData = $bookObj->arriveBook(); 

?>

<div class="">
	<div class="row">
		<div class="col-md-3">
			<?php
			include_once ('../view/user_left_menu.php');
 			?>
			</div>
		<div class="col-md-9">
		   <table class="table table-condensed table-responsive table-hover" id="newarrival">
				<thead>
					<tr>
						<th colspan="2">
						Notices :
						</th>
					</tr>	
				</thead>
				<tbody>
					<?php foreach ($data as $key=>$value) {
			 		?>
					<tr>
						<td>
						<?php echo $key+1; ?>.
					    </td>
					    <td><?php echo $value['message']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
		   </table>
		   <table id="newarrival" class="table table-condensed table-responsive table-hover">
		   	<h5>New Arrival :</h5>
		   	<thead>
		   		<tr>
		   			<th>Sr No.</th>
		   			<th>Books Name</th>
		   			<th>Author Name</th>
		   		</tr>
		   	</thead>
		   	<tbody>
		   		<?php foreach ($bookData as $key => $value) {
		   		    ?>
		   		<tr>
	   			    <td><?php echo $key+1; ?>.</td>
		   			<td><?php echo $value['name']; ?></td>
		   			<td><?php echo $value['author']; ?></td>
		   			<?php } 
		   		 ?>
		   		</tr>
		   	</tbody>
		   </table>
	   </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#newarrival').DataTable();
} );
</script>
