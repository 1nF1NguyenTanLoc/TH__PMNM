<?php

class productModel extends Model
{
	/*private $masp, $tensp, $gia;*/
	function __construct()
	{
		parent::__construct();
	}
	function getPrds($orderBy, $start, $last, $where = null){
		if($where === null){
			$sql = "SELECT * FROM sanpham ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		} else {
			$sql = "SELECT * FROM sanpham WHERE ".$where." ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		}
		
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd[] = $row;
		}
		return $prd;
	}
	function getPrdById($masp){
		$sql = "SELECT * FROM sanpham WHERE masp = ".$masp;
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd = $row;
		}
		return $prd;
	}

}