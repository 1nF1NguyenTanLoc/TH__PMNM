<?php

class orderModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllOrders(){
		$gd = $this->select('*', 'giaodich',null, 'ORDER BY date DESC');
		for ($i=0; $i < count($gd); $i++) { 
			$magdArr[] = $gd[$i]['magd'];
		}
		for ($i=0; $i < count($gd); $i++){
			$sp = $this->select('*','chitietgd ctgd, sanpham sp',"ctgd.masp = sp.masp AND ctgd.magd = ".$magdArr[$i]."");
			for ($j=0; $j < count($sp); $j++) { 
				$cart[$j] = array('masp'=> $sp[$j]['masp'], 'tensp' => $sp[$j]['tensp'],'dongia'=> $sp[$j]['gia'], 'soluong'=>$sp[$j]['soluong']);
			}
			
			$gd[$i]['sp'] = $cart; $cart = null;
		}
		return $gd;
		/*echo "<pre>";
		print_r($gd);
		echo "</pre>";*/
	}
	function orderToday(){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$today = $now->format('Y-m-d');
		$rs = $this->select('count(magd) as neworder','giaodich',"DATE(date) = '".$today."'");
		return $rs[0]['neworder'];
	}
	function gerOrderById(){
		$magd = 44;
		$rs = $this->select('*','giaodich',"magd = '".$magd."'");
		return $rs;
	}
}