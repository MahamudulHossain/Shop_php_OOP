<?php

	include_once 'lib/Database.php';
	include_once 'helpers/Format.php';
class CartData
{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addToCart($quantity,$id){
			$quantity =  mysqli_real_escape_string($this->db->link,$quantity);
			$id =  mysqli_real_escape_string($this->db->link,$id);

			$pQuery = "SELECT * FROM tbl_product WHERE productId = '$id' ";
			$presult = $this->db->select($pQuery)->fetch_assoc();

			$productName = $presult['productName'];
			$price = $presult['price'];
			$image = $presult['image'];
			$sId = session_id();

			$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$id','$productName','$price','$quantity','$image')";
			$inserted_rows = $this->db->insert($query);
			    if($inserted_rows){
					header("Location:cart.php");
				}else{
					header("Location:404.php");
					
				}
		}

		public function cartAllData(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$allData  = $this->db->select($query);
			return $allData;
		}
}

?>