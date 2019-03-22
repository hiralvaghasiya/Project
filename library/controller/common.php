 <?php
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'model/notice.php');
//session_start();
class common{
	
	public function __construct(){
      
	}

	function addNotice(){

        if(empty($_SESSION['user_id'])){
            header('location: ../index.php');
        }

            $data=array(
                'message'=>$_POST['message'],
                'from_date'=>$_POST['from_date'],
                'to_date'=>$_POST['to_date'],
            );

        $addNotice = new notice();
        $addNotice->addNotice($data);

         $_SESSION['success_msg'] = 'edit successfully.';
                header('location: ../view/list_books.php');
    }

    function listNotice(){

       if(empty($_SESSION['user_id'])){
            // header('location: ../index.php');
        }

        $obj=new notice();
        $list=$obj->listDb();

        return $list;

    }

}

?>