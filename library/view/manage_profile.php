<?php 

$addMemberClass='active';
$listClass=$issuedClass=$requestClass=$noticeClass='';

include_once ('../controller/member.php');
include 'user_header.php';
include 'user_left_menu.php';

   

  $getUser = new memberController();
      if(!empty($_POST['id'])){
         $data=$getUser->editUser($_SESSION['member_id']);
      }
        else{
        $data=$getUser->getmember($_SESSION['member_id']);
        }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    </div>
    <div class="row">
    </div>
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
          <form name="addmember" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                  <table cellpadding="3" cellspacing="3" width="auto" height="100%">
                      <tr>
                          <td>User Name : </td>
                          <td><input type="hidden" readonly><?php echo $data['user_name']; ?></td>
                      </tr>
                      <tr>
                          <td>First Name : </td>
                          <td><input type="text" name="firstname" value="<?php echo $data['fname']; ?>"></td>
                      </tr>
                      <tr>
                          <td>Last Name :</td>
                          <td><input type="text" name="lastname" value="<?php echo $data['lname']; ?>"></td>
                      </tr>
                      <tr>
                          <td>Age :</td>
                          <td><input type="text" name="age" value="<?php echo $data['age']; ?>"></td>
                      </tr>
                      <tr>
                          <td>Address :</td>
                          <td><textarea rows="4" cols="10" name="address"><?php echo $data['address']; ?></textarea></td>
                      </tr>
                      <tr>
                          <td>Gender :</td>
                          <?php 
                            if(!empty($data['gender']) && $data['gender'] == 'female'){
                              $fcheck='checked';
                              $mcheck='';
                            }
                            else {
                              $mcheck='checked';
                              $fcheck='';
                            }
                          ?>
                          <td><input type="radio" name="gender" value="male" <?php echo $mcheck ?>>Male
                          <input type="radio" name="gender" value="female" <?php echo $fcheck ?>>Female</td>
                      </tr>
                      <tr>
                        <td>Display Photo:</td>
                        <td><img width="100" height="100" src="<?php echo '../media/image/profile/'.$data['image_path']; ?>"></td>
                      </tr>
                      <tr>
                          <td>Change Photo :</td>
                          <td><input type="file" name="image" id="image" value=""></td>
                      </tr>
                      <tr>
                          <td colspan="2" align="center"><button type="submit" value="addmember">Submit</button></td>
                      </tr>
                  </table>
              </form>
        </div>
  </div>

</body>
</html>