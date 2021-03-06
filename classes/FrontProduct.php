<?php

	include_once 'lib/Database.php';
	include_once 'helpers/Format.php';


	class FrontProduct
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function allFeatData(){
			$query = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function allNewData(){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product,tbl_category,tbl_brand WHERE tbl_product.catId = tbl_category.catId AND tbl_product.brandId = tbl_brand.brandId  ORDER BY tbl_product.productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function productFind($id){
			$proID = $this->fm->validation($id);
			$proID = mysqli_real_escape_string($this->db->link,$proID);

			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product,tbl_category,tbl_brand WHERE tbl_product.catId = tbl_category.catId AND tbl_product.brandId = tbl_brand.brandId AND tbl_product.productId = '$proID' ";
			$result = $this->db->select($query);
			return $result;

		} 

		public function productIphone(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function productSamsung(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function productAcer(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function productCanon(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getAllCatName(){
			$query = "SELECT * FROM tbl_category ORDER BY catId DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function productByCategory($id){
			$id = $this->fm->validation($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$query = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY productId DESC ";
			$result = $this->db->select($query);
			return $result;
		}

	}	

?>		