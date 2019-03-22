
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<!-- <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"> -->
</head>
<body>
<ul class="nav nav-list bs-docs-sidenav affix">
  <li><h4>Manage Books</li></h4>
  <li class="<?php echo $listClass; ?>"><a href="user_list_books.php"><i class="icon-chevron-right"></i>List Books</a></li>
  <li class="<?php echo $issuedClass; ?>"><a href="user_issued_booklist.php"><i class="icon-chevron-right"></i>Issued Book List</a></li>
  <li class="<?php echo $requestClass; ?>"><a href="user_book_request.php"><i class="icon-chevron-right"></i>Book Request Form</a></li>
  <li><h4>Manage Profile</li></h4>
 
  <li class="<?php echo $noticeClass; ?>"><a href="account.php"><i class="icon-chevron-right"></i>Notice Board</a></li>
  
  <li class="<?php echo $addMemberClass; ?>"><a href="manage_profile.php"><i class="icon-chevron-right"></i>Manage Profile</a></li>
  
</ul>
</body>
</html>