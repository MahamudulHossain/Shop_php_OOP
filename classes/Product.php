<?php

	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';

	class Product
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addProduct($data,$file){
			$productName =  mysqli_real_escape_string($this->db->link,$data['productName']);
			$catId =  mysqli_real_escape_string($this->db->link,$data['catId']);
			$brandId =  mysqli_real_escape_string($this->db->link,$data['brandId']);
			$description =  mysqli_real_escape_string($this->db->link,$data['description']);
			$price =  mysqli_real_escape_string($this->db->link,$data['price']);
			$type =  mysqli_real_escape_string($this->db->link,$data['type']);

			//Image Uploading with Validation

			$permited  = array('jpg', 'jpeg', 'png');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;

		    if ($file_size >1048567) {
		     $Msg =  "<span style='color:red; font-size:18px; font-weight:bold;'>Image Size should be less then 1MB!</span>";
		    } elseif (in_array($file_ext, $permited) === false) {
		     $Msg =  "<span style='color:red; font-size:18px; font-weight:bold;'>You can upload only:-".implode(', ', $permited)."</span>";
		    } else{
		    move_uploaded_file($file_temp, $uploaded_image);

		    $query = "INSERT INTO  tbl_product(productName,catId,brandId,description,price,image,type) 
		    VALUES('$productName','$catId','$brandId','$description','$price','$uploaded_image','$type')";
		    $inserted_rows = $this->db->insert($query);
			    if($inserted_rows){
					$Msg = "<span style='color:green; font-size:18px; font-weight:bold;'>Product Inserted Successfully<span>";
				}else{
					$Msg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
				}
		    }
		    return $Msg;
		}

		public function productAll(){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product,tbl_category,tbl_brand WHERE tbl_product.catId = tbl_category.catId AND tbl_product.brandId = tbl_brand.brandId  ORDER BY tbl_product.productId DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function proFind($id){
			$proID = $this->fm->validation($id);
			$proID = mysqli_real_escape_string($this->db->link,$proID);

			$query = "SELECT * FROM tbl_product WHERE productId = '$proID' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function editProduct($data,$file,$id){

			$productName =  mysqli_real_escape_string($this->db->link,$data['productName']);
			$catId =  mysqli_real_escape_string($this->db->link,$data['catId']);
			$brandId =  mysqli_real_escape_string($this->db->link,$data['brandId']);
			$description =  mysqli_real_escape_string($this->db->link,$data['description']);
			$price =  mysqli_real_escape_string($this->db->link,$data['price']);
			$type =  mysqli_real_escape_string($this->db->link,$data['type']);

			if($file['image']['name']){

				$permited  = array('jpg', 'jpeg', 'png');
			    $file_name = $file['image']['name'];
			    $file_size = $file['image']['size'];
			    $file_temp = $file['image']['tmp_name'];

			    $div = explode('.', $file_name);
			    $file_ext = strtolower(end($div));
			    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "upload/".$unique_image;

			    if ($file_size >1048567) {
			     $Msg =  "<span style='color:red; font-size:18px; font-weight:bold;'>Image Size should be less then 1MB!</span>";
			    } elseif (in_array($file_ext, $permited) === false) {
			     $Msg =  "<span style='color:red; font-size:18px; font-weight:bold;'>You can upload only:-".implode(', ', $permited)."</span>";
			    } else{
			    move_uploaded_file($file_temp, $uploaded_image);

			    $query = "UPDATE  tbl_product SET productName = '$productName',catId = '$catId',brandId = '$brandId',description = '$description',price = '$price',image = '$uploaded_image',type = '$type'WHERE productId = '$id' ";

			    $inserted_rows = $this->db->update($query);
				    if($inserted_rows){
						$Msg = "<span style='color:green; font-size:18px; font-weight:bold;'>Product Updated Successfully<span>";
					}else{
						$Msg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
					}
			    }

			}else{

				 $query = "UPDATE  tbl_product SET productName = '$productName',catId = '$catId',brandId = '$brandId',description = '$description',price = '$price',type = '$type'WHERE productId = '$id' ";

			    $inserted_rows = $this->db->update($query);
				    if($inserted_rows){
						$Msg = "<span style='color:green; font-size:18px; font-weight:bold;'>Product Updated Successfully<span>";
					}else{
						$Msg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
					}
			}

			return $Msg;
		}


		public function proDel($id){

			$id = $this->fm->validation($id);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$imgqr = "SELECT * FROM tbl_product where productId = '$id' ";
			$imgRs = $this->db->select($imgqr);
			if($imgRs){
				while($imgRw = $imgRs->fetch_assoc()){
					$imgLink = $imgRw['image'];
					unlink($imgLink);
				}
			}

			$query = "DELETE FROM tbl_product WHERE productId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$proMsg = "<span style='color:green; font-size:18px; font-weight:bold;'>Product Deleted Successfully<span>";
			}else{
				$proMsg = "<span style='color:red; font-size:18px; font-weight:bold;'>Opps! Something went wrong<span>";
			}
			return $proMsg;
		}

		

	}
?>