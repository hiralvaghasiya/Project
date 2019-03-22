 <?php
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/admin.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/user_session.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/member.php');
session_start();
class login{
	
	public function __construct(){
      
	}

	function checkLogin(){

		$email=$_POST['email'];
		$password=$_POST['password'];

		$adminObj = new admin();
		$data = $adminObj->checkLogin($email,$password);
    		
    		if($data){
				$id = session_id();
				$_SESSION['user_id'] = $data['id'];
				
					$userObj=new user_session();
					$isSession=$data=$userObj->checkSession($id);

					if(!$isSession){
						$data=$userObj->addSession($id,$data['id']);
					}

					$memberData=$adminObj->getAdminData($_SESSION['user_id']);
					$_SESSION['fname'] = $memberData['fname'];
					$_SESSION['image_path'] = $memberData['image_path'];

					header('location: view/list_books.php');
			}else{
				$_SESSION['error_msg'] = 'Invalid Login Credentials';
				//header('location: index.php');
			     }
	}

	function logout(){

		$logout=new admin();
		$logout->logout();
		
		session_destroy();
	}

	function addUser(){

		$data=array(
	         	'email'=>$_POST['email'],
	         	'password'=>$_POST['password']
	  	     	);
		$addUser = new members();
		$isSuccess = $addUser->adduser($data);

		header('location: index.php');
	}

	function userLogin(){

		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$adminObj = new members();
		$data = $adminObj->userLogin($email,$password);
    		
    		if($data){
				$id = session_id();
				$_SESSION['member_id'] = $data['id'];
				
					$userObj=new user_session();

					$isSession=$data=$userObj->checkMemberSession($id);

					if(!$isSession){
						$data=$userObj->addMemberSession($id,$data['id']);
					}

					$memberData=$adminObj->getMemberData($_SESSION['member_id']);
					$_SESSION['fname'] = $memberData['fname'];
					$_SESSION['image_path'] = $memberData['image_path'];

				header('location:view/account.php');
			}else{
				$_SESSION['error_msg'] = 'Invalid Login Credentials';
				//header('location: user_login.php');
			}
	}
	function userLogout(){

		$logout=new members();
		$logout->userLogout();
		
		session_destroy();
	}
}

?>