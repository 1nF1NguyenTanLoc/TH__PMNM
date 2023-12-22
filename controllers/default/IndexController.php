<?php 
/**
* 
*/
class IndexController extends Controller
{
	function __construct(){
		$this->folder = "default";
	}
	function index()
	{
		require_once 'vendor/Model.php';
		require_once 'models/default/productModel.php';
		$md = new productModel;

		$data[] = $md->getPrds('ngay_nhap',4,4);
		$data[] = $md->getPrds('ngay_nhap',0,4);
		$data[] = $md->getPrds('luotmua',0,4);

		$this->render('index', $data);
	}
	function signup(){
		if(isset($_SESSION['user'])){
			header('location: ../');
		}
		$this->render('signup');
	}
	function signin(){
		if(isset($_SESSION['user'])){
			header('location: ../');
		}
		$this->render('signin');
	}
}
?>