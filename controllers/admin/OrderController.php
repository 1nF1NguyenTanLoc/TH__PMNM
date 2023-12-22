<?php

/**
* 
*/
class OrderController extends Controller
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
		require_once 'models/admin/orderModel.php';
		$md = new orderModel;
		$data = $md->getAllOrders();
		$this->render('order',$data,'GIAO DỊCH','admin');
	}
	function gerOrderById(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/orderModel.php';
		$md = new orderModel;
		$magd = "";
		if(isset($_GET['magd'])){$magd = $_GET['magd'];}
		$data = $md->gerOrderById();
		$tmp = array_values($data[0]);
		$rs = "array(";
		$x='';
		foreach ($tmp as $key => $value) {
			if($key%2 != 0){continue;}
			$rs .= "'".$key."'=>'".$value."',";
		}
		echo $rs;
	}
	/*function shipped(){
		$slt = '';
		if(isset($_GET['selected'])){$slt = $_GET['selected'];}
		if($slt == ''){echo "Bạn chưa chọn giao dịch muốn đổi trạng thái!";}
		require_once 'vendor/Model.php';
		require_once 'models/admin/orderModel.php';
		$md = new orderModel;
		for ($i=0; $i < count($slt); $i++) {
			$md->update('giaodich','tinhtrang','1',"magd = '".$slt[$i]."'");
		}
		return 1;
	}*/
	function action(){
		$slt = $action = '';
		if(isset($_GET['selected'])){$slt = $_GET['selected'];}
		if(isset($_GET['action'])){$action = $_GET['action'];}
		if($slt == ''){echo "Bạn chưa chọn giao dịch!";}
		require_once 'vendor/Model.php';
		require_once 'models/admin/orderModel.php';
		$md = new orderModel;
		for ($i=0; $i < count($slt); $i++) {
			switch ($action) {
				case 'shipped':
				$md->update('giaodich','tinhtrang','1',"magd = '".$slt[$i]."'");
				break;
				case 'unshipped':
				$md->update('giaodich','tinhtrang','0',"magd = '".$slt[$i]."'");
				break;
				case 'del':
				$md->delete('giaodich',"magd = '".$slt[$i]."'");
				break;
				case 'cancel':
				$md->update('giaodich','tinhtrang','2',"magd = '".$slt[$i]."'");
				break;
				
				default:
					echo "Error!";
				break;
			}
		}
		echo "success";
	}
}