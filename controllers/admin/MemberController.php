<?php

/**
* 
*/
class MemberController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";
		if(!isset($_SESSION['admin'])){
			header("Location: http://localhost/WBH_MVC/indexadmin");
		}
	}
	function index(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/memberModel.php';
		$md = new memberModel;
		$data = $md->getAllMembers();
		$this->render('member',$data,'THÀNH VIÊN','admin');
	}
	function action(){
		$actionName = $id = '';
		if(isset($_POST['name'])){$actionName = $_POST['name'];}
		if(isset($_POST['id'])){$id = $_POST['id'];}
		require_once 'vendor/Model.php';
		require_once 'models/admin/memberModel.php';
		$md = new memberModel;
		switch ($actionName) {
			case 'del':
			$md->delete('thanhvien','id = '.$id);
			break;
			case 'add':
			$data = array('');
			if(isset($_POST['name2'])){$data[] = $_POST['name2'];} else {$data[] = 'No info';}
			if(isset($_POST['username'])){$data[] = $_POST['username'];} else {$data[] = 'No info';}
			if(isset($_POST['password'])){$data[] = $_POST['password'];} else {$data[] = 'No info';}
			if(isset($_POST['addr'])){$data[] = $_POST['addr'];} else {$data[] = 'No info';}
			if(isset($_POST['tel'])){$data[] = $_POST['tel'];} else {$data[] = 'No info';}
			if(isset($_POST['email'])){$data[] = $_POST['email'];} else {$data[] = 'No info';}
			$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
			$now = $now->format('Y-m-d H:i:s');
			$data[] = $now; $data[] = '0';
			$md->insert('thanhvien',$data);
			break;
			
			default:
			echo "Error!";
			break;
		}
	}
}