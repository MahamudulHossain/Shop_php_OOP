<?php
	include '../lib/Database.php';
	include_once '../lib/Session.php';
	include '../helpers/Format.php';

class AdminOrder
{
	
	private $db;
	private $fm;
	
	public function __construct()
	{
		 $this->db = new Database();
		 $this->fm = new Format();
	}

	public function getOrderDetails(){
		$query = "SELECT * FROM tbl_order GROUP BY cmrId ORDER BY odate DESC "; 
		$result = $this->db->select($query);
			return $result;
	}

	public function uniqueDate($id){
		$query = "SELECT odate FROM tbl_order WHERE cmrId = '$id' GROUP BY odate  "; 
		$result = $this->db->select($query);
			return $result;
	}

	public function allDate($id,$uDate){
		$query = "SELECT * FROM tbl_order WHERE cmrId='$id' AND odate='$uDate' "; 
		$result = $this->db->select($query);
			return $result;
	}
}
?>