<?php

/**
* 
*/
class IndexAdminController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";

	}
	function index(){
		require_once 'views/admin/index.php';
	}
	function dashboard(){
		if(!isset($_SESSION['admin'])){
			header("Location: http://localhost/WBH_MVC/indexadmin");
		}
		require_once 'vendor/Model.php';
		require_once 'models/admin/orderModel.php';
		$md = new orderModel;
		require_once 'models/admin/memberModel.php';
		$mb = new memberModel;
		require_once 'models/admin/productModel.php';
		$prd = new productModel;
		$data[] = $md->orderToday();
		$data[] = $mb->memberToday();
		$data[] = count($prd->getAllPrds());
		$data[] = $mb->allMember();
		$this->render('dashboard',$data,null,'admin');
	}
	function login(){
		require_once 'vendor/Model.php';
		require_once 'models/users/userModel.php';
		$md = new userModel;
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == "" || $password == ""){
			echo "Không được để trống!";
			return 0;
		}
		$data = array();
		if($md->getUserByUsername($username)){
			$data = $md->getUserByUsername($username);
			if($password == $data['matkhau'] && $data['quyen'] == '1'){
				echo "LoginSuccess";
				$_SESSION['user'] = $data;
				$_SESSION['admin'] = $data;
				return true;
			} else {
				echo "Sai tên tài khoản hoặc mật khẩu!";
			}
		} else {
			echo "Sai tên tài khoản hoặc mật khẩu!";
		}
	}
	function logout(){
		session_unset();
		session_destroy();
		unset($_COOKIE['user']);
		setcookie('user',null,-1,'/');
	}
}