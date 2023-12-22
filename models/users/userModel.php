<?php 

/**
* 

*/
class userModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getUserByUsername($username)
	{
		$result = array();
		$sql = "SELECT * FROM thanhvien WHERE tentaikhoan = '".$username."'";
		if($this->conn->query($sql)->rowCount() == 0){
			return false;
		} else {
			foreach($this->conn->query($sql) as $row){
				$result = $row;
			}
			return $result;
		}
	}
	function addUser($name, $un, $pw, $addr, $phone, $email){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$now = $now->format('Y-m-d H:i:s');
		$sql = "INSERT INTO thanhvien VALUES ('','".$name."','".$un."','".$pw."','".$addr."','".$phone."','".$email."','".$now."','0')";
		if(!$this->conn->query($sql)){
			return false;
		} else {
			return true;
		}
	}
}