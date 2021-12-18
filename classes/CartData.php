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

			$cartCheck = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId' ";
			$checkData = $this->db->select($cartCheck);
			if($checkData){
				$msg = "Product already added";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$id','$productName','$price','$quantity','$image')";
				$inserted_rows = $this->db->insert($query);
			    if($inserted_rows){
					header("Location:cart.php");
				}else{
					header("Location:404.php");
					
				}
			}
			
		}

		public function cartAllData(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$allData  = $this->db->select($query);
			return $allData;
		}

		public function updateItemNumber($quantity,$cartId){
			$quantity = $this->fm->validation($quantity);
			$cartId = $this->fm->validation($cartId);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$cartId = mysqli_real_escape_string($this->db->link,$cartId);
			$query = "UPDATE tbl_cart set quantity = '$quantity' WHERE cartId = '$cartId' ";
			$result = $this->db->update($query);
			if($result){
				$cartMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Cart Updated Successfully<span>";
			}else{
				$cartMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $cartMsg;
		}

		public function cartItemDel($id){
			$id = $this->fm->validation($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				echo "<script>window.location.href='cart.php'</script>";
			}
			
		}

		public function sessionCheck($sid){
			$session_id_query = "SELECT sId FROM tbl_cart WHERE sId = '$sid' ";
			$checkRes  = $this->db->select($session_id_query);
			return $checkRes;
		}
}

?>