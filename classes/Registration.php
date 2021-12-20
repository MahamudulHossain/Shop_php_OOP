<?php

	include_once 'lib/Database.php';
	include_once 'helpers/Format.php';
class Registration{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function userRegistration($data){
			$name =  mysqli_real_escape_string($this->db->link,$data['name']);
			$email =  mysqli_real_escape_string($this->db->link,$data['email']);
			$address =  mysqli_real_escape_string($this->db->link,$data['address']);
			$phone =  mysqli_real_escape_string($this->db->link,$data['phone']);
			$zip =  mysqli_real_escape_string($this->db->link,$data['zip']);
			$password =  mysqli_real_escape_string($this->db->link,md5($data['password']));

			$mailQuery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
			$mailChk = $this->db->select($mailQuery);

			if($mailChk){
				$Msg = "<span style='color:red; font-size:18px; font-weight:bold;'>This email user is already registered!!<span>";
			}else{
				$query = "INSERT INTO  tbl_user(name,email,address,phone,zip,password) 
			    VALUES('$name','$email','$address','$phone','$zip','$password')";
			    $inserted_rows = $this->db->insert($query);
			    if($inserted_rows){
					$Msg = "<span style='color:green; font-size:18px; font-weight:bold;'>User registration Successful<span>";
				}else{
					$Msg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
				}
			}
			return $Msg;
			
		}
}
?>