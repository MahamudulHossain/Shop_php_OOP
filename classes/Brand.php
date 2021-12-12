<?php
	include '../lib/Database.php';
	include '../helpers/Format.php';

	class Brand
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addBrand($brandName){
			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link,$brandName);

			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$result = $this->db->insert($query);
			if($result){
				$brandMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Brand Inserted Successfully<span>";
			}else{
				$brandMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $brandMsg;
		}

		public function brandAll(){
			$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function brandFind($id){
			$brandID = $this->fm->validation($id);
			$brandID = mysqli_real_escape_string($this->db->link,$brandID);

			$query = "SELECT * FROM tbl_brand WHERE brandId = '$brandID' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function updateBrand($brandNameUpdate,$id){
			$brandNameUpdate = $this->fm->validation($brandNameUpdate);
			$id = $this->fm->validation($id);
			$brandNameUpdate = mysqli_real_escape_string($this->db->link,$brandNameUpdate);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_brand set brandName = '$brandNameUpdate' WHERE brandId = '$id' ";
			$result = $this->db->update($query);
			if($result){
				$brandMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Brand Updated Successfully<span>";
			}else{
				$brandMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $brandMsg;
		}

		public function brandDel($id){
			$id = $this->fm->validation($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$query = "DELETE FROM tbl_brand WHERE brandId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$brandMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Brand Deleted Successfully<span>";
			}else{
				$brandMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $brandMsg;
		}
	}
?>