<?php 
//session_start();
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/member.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/admin.php');

class memberController{

    public function __construct(){
      
	}
    function addmember(){
        if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
    	$data=array(
	         	'firstname'=>$_POST['firstname'],
	         	'lastname'=>$_POST['lastname'],
	         	'age'=>$_POST['age'],
	         	'address'=>$_POST['address'],
	         	'gender'=>$_POST['gender']
	     	);

		$addMember = new members();
		$addMember->addMember($data);

		 $_SESSION['success_msg'] = 'Add successfully.';
				header('location: ../view/list_member.php');

    }

    function listMember(){
        if(empty($_SESSION['user_id'])){
        //header('location: ../index.php');
      }

    	$addMember = new members();
    	$list=$addMember->listMember();

    	return $list;

    }

    function getmember($id){
      //   if(empty($_SESSION['user_id'])){
      //    header('location: ../index.php');
      // }
    	$addMember = new members();
    	$list=$addMember->getMemberData($id);

    	return $list;

    }

    function editMember(){
        if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
        
			$data=array(
	         	'firstname'=>$_POST['firstname'],
	         	'lastname'=>$_POST['lastname'],
	         	'age'=>$_POST['age'],
	         	'address'=>$_POST['address'],
	         	'gender'=>$_POST['gender']
	     	);

			$editMember = new members();
	    	$editMember->editMember($data, $_POST['id']);

    	$_SESSION['success_msg'] = 'update successfully.';
				header('location: ../view/list_member.php');
    }
    function deleteMember($id){

      if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
        $dltBook=new members();
        $dltBook->deleteMemberDb($id);
    }

    function getMemberList($search){
        if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
    	$memberList=new members();
    	$list=$memberList->getMemberList($search);

    		$data = array();
    	       foreach ($list as $key => $member) {
    		$data[$member['id']] = $member['fname'].' '.$member['lname'];
    	}
       	echo json_encode($data);
    }

function editUser(){
        if(empty($_SESSION['member_id'])){
        header('location: ../index.php');
      }

        if(isset($_FILES['image'])){
          
              $errors= array();
              $file_name = $_FILES['image']['name'];
              $file_size =$_FILES['image']['size'];
              $file_tmp =$_FILES['image']['tmp_name'];
              $file_type=$_FILES['image']['type'];
              $exts = explode('.',$_FILES['image']['name']);
              $file_ext=strtolower(end($exts));
              
              $expensions= array("jpeg","jpg","png");
              
              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              
              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)){
                 move_uploaded_file($file_tmp,"../media/image/profile/".$file_name);
                 echo "Success"; 
              }else{
                 print_r($errors);
              }
        }

            $data=array(
                'firstname'=>$_POST['firstname'],
                'lastname'=>$_POST['lastname'],
                'age'=>$_POST['age'],
                'address'=>$_POST['address'],
                'gender'=>$_POST['gender'],
                'image_path'=>$file_name
            );

            $editMember = new members();
            $editMember->editMember($data, $_POST['id']);

        $_SESSION['success_msg'] = 'update successfully.';
                header('location: ../view/user_list_books.php');
    }

    function getAdmin($id){
      
      $addMember = new admin();
      $list=$addMember->getAdminData($id);

      return $list;

    }

    function editAdmin(){
        if(empty($_SESSION['user_id'])){
        header('location: ../index.php');
      }
       
      if(isset($_FILES['image'])){
          
              $errors= array();
              $file_name = $_FILES['image']['name'];
              $file_size =$_FILES['image']['size'];
              $file_tmp =$_FILES['image']['tmp_name'];
              $file_type=$_FILES['image']['type'];
              $exts = explode('.',$_FILES['image']['name']);
              $file_ext=strtolower(end($exts));
              
              $expensions= array("jpeg","jpg","png");
              
              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              
              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)){
                 move_uploaded_file($file_tmp,"../media/image/profile/".$file_name);
                 echo "Success"; 
              }else{
                 print_r($errors);
              }
        }

            $data=array(
                'fname'=>$_POST['fname'],
                'lname'=>$_POST['lname'],
                'age'=>$_POST['age'],
                'address'=>$_POST['address'],
                'gender'=>$_POST['gender'],
                'image_path'=>$file_name
            );

            $editMember = new admin();
            $editMember->editAdmin($data, $_POST['id']);

        $_SESSION['success_msg'] = 'update successfully.';
                header('location: ../view/admin_manage_profile.php');
    }
}

?>