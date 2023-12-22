<?php

/**
* 
*/
class Controller
{
	protected $folder;
	
	function render($file, $data = array(), $title = null, $admin = null){
		$file_path = "views/".$this->folder."/".$file.".php";
		if(file_exists($file_path)){

			ob_start();//start output buffering
			require_once($file_path);
			$content = ob_get_clean();// gui toan bo code len server va luu vao bien content
			if($admin == null){
				require_once('views/layouts/application.php');	
			} else {
				require_once('views/layouts/admin.php');
			}
			
		} else {
			echo "Khong tim thay view";
			echo "<br>".$file_path;
		}
	}
}