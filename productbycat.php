<?php 
	include 'inc/header.php'; 

	$pdObj = new FrontProduct();
	$fmObj = new Format();
    if(!isset($_GET['cateId']) || $_GET['cateId'] == NULL){
        header('Location:404.php');
    }else{
        $id = $_GET['cateId'];
        $proByCat = $pdObj->productByCategory($id);
    }

?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	 <?php
	      	 	if($proByCat){
	      	 		while($pdRow = $proByCat->fetch_assoc()){
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="productDetails.php?fPdId=<?php echo $pdRow['productId']?>"><img src="admin/<?php echo $pdRow['image']?>" alt="Image" /></a>
					 <h2><?php echo $pdRow['productName']?></h2>
					 <p><?php echo $fmObj->textShorten($pdRow['description'],60)?></p>
					 <p><span class="price">$<?php echo $pdRow['price']?></span></p>
				     <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $pdRow['productId']?>" class="details">Details</a></span></div>
				</div>
			 <?php 
				} }else{
					echo "<h3>Sorry! This product is not available at this moment</h3>";
				}	
			 ?>
		  </div>
	
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
