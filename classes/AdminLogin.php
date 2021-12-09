<?php

	include '../lib/Database.php';
	include '../lib/Session.php';
	Session::checkLogin();
	include '../helpers/Format.php';


class AdminLogin{

	private $db;
	private $fm;
	
	public function __construct()
	{
		 $this->db = new Database();
		 $this->fm = new Format();
	}

	public function adminLogin($adminUser,$adminPass){
			
		$adminUser = $this->fm->validation($adminUser);	
		$adminPass = $this->fm->validation($adminPass);	

		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

		$query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass = '$adminPass' ";
		$result = $this->db->select($query);
		if($result != false){
			$value = $result->fetch_assoc();
			Session::set('login', true);
			Session::set('adminId', $value['adminId']);
			Session::set('adminName', $value['adminName']);
			Session::set('adminUser', $value['adminId']);
			header('Location:index.php');
		}else{
			$errMsg = "Login credentials Not Matching";
			return $errMsg;
		}

	}
}
?>