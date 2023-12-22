<?php 

/**
* 
*/
class ProductController extends Controller
{
	
	function __construct()
	{
		$this->folder = "default";
	}
	function index(){
		$this->List();
	}
	function List($type = null){
		require_once 'vendor/Model.php';
		require_once 'models/default/productModel.php';
		require_once 'models/admin/categoryModel.php';
		$ctgr = new categoryModel;
		$allCtgrs = $ctgr->getAllCtgrs();
		$md = new productModel;

		$data = $title = null;
		switch ($type) {
			case 'BestSelling':
			$data = $md->getPrds('luotmua',0,8);
			$title = "<span id='contentTitle' data-type='bestselling'>Mua nhiều tuần qua</span>";
			break;
			case 'Newest':
			$data = $md->getPrds('ngay_nhap',0,8);
			$title = "<span id='contentTitle' data-type='newest'>Sản phẩm mới</span>";
			break;
			case 'OnSale':
			$data = $md->getPrds('khuyenmai',0,8);
			$title = "<span id='contentTitle' data-type='onsale'>Sản phẩm đang giảm giá</span>";
			break;
			case 'All':
			$data = $md->getPrds('gia',0,8);
			$title = "<span id='contentTitle' data-type='all'>Sản phẩm đang giảm giá</span>";
			break;
			case '':
			$data = $md->getPrds('gia',0,8);
			$title = "<span id='contentTitle' data-type='all'>Sản phẩm đang giảm giá</span>";
			break;

			default:
			for ($i=0; $i < count($allCtgrs); $i++) {
				$case = preg_replace('/\s+/', '', ucfirst($allCtgrs[$i]['tendm']));
				switch ($type) {
					case $case:
					$data = $md->getPrds('gia',0,8,'madm = '.$allCtgrs[$i]['madm']);
					$title = "<span id='contentTitle' data-type='".$case."'>Thương hiệu: ".$allCtgrs[$i]['tendm']."</span>";
					break;
				}
			}
		}
		$this->render('Products',$data, $title);
	}
	function PrdDetail($masp){
		require_once 'vendor/Model.php';
		require_once 'models/default/productModel.php';
		$md = new productModel;
		$data = $md->getPrdById($masp);
		$title = $data['tensp'];
		require_once 'views/default/ProductDetail.php';
	}
}