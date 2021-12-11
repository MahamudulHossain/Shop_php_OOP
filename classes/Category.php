<?php
	include '../lib/Database.php';
	include '../helpers/Format.php';

	class Category
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addCat($cateName){
			$cateName = $this->fm->validation($cateName);
			$cateName = mysqli_real_escape_string($this->db->link,$cateName);

			$query = "INSERT INTO tbl_category(catName) VALUES('$cateName')";
			$result = $this->db->insert($query);
			if($result){
				$catMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Category Inserted Successfully<span>";
			}else{
				$catMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $catMsg;
		}

		public function cateAll(){
			$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function catFind($id){
			$catID = $this->fm->validation($id);
			$catID = mysqli_real_escape_string($this->db->link,$catID);

			$query = "SELECT * FROM tbl_category WHERE catId = '$catID' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function upadteCat($cateNameUpdate,$id){
			$cateNameUpdate = $this->fm->validation($cateNameUpdate);
			$id = $this->fm->validation($id);
			$cateNameUpdate = mysqli_real_escape_string($this->db->link,$cateNameUpdate);
			$id = mysqli_real_escape_string($this->db->link,$id);

			$query = "UPDATE tbl_category set catName = '$cateNameUpdate' WHERE catId = '$id' ";
			$result = $this->db->update($query);
			if($result){
				$catMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Category Updated Successfully<span>";
			}else{
				$catMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $catMsg;
		}

		public function catDel($id){
			$id = $this->fm->validation($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$query = "DELETE FROM tbl_category WHERE catId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$catMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Category Deleted Successfully<span>";
			}else{
				$catMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $catMsg;
		}
	}
?>