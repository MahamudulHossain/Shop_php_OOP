<?php include 'inc/header.php'; 
	
	$pdObj = new FrontProduct();
    $fmObj = new Format();
	$cartObj = new CartData();

	if(!isset($_GET['fPdId']) || $_GET['fPdId'] == NULL){
			        header('Location:404.php');
    }else{
        $id = $_GET['fPdId'];
        $proData = $pdObj->productFind($id);
    }

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $quantity = $_POST['quantity'];
        $addcart = $cartObj->addToCart($quantity,$id);
    }
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    			if($proData){
    				while($prdRow = $proData->fetch_assoc()){

    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $prdRow['image']?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $prdRow['productName']?> </h2>
						<p><?php echo $fmObj->textShorten($prdRow['description'],60)?>......</p>					
						<div class="price">
							<p>Price: <span>$<?php echo $prdRow['price']?></span></p>
							<p>Category: <span><?php echo $prdRow['catName']?></span></p>
							<p>Brand:<span><?php echo $prdRow['brandName']?></span></p>
						</div>
						<div class="add-cart">
							<form action="" method="post">
								<input type="number" class="buyfield" name="quantity" value="1"/>
								<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
							</form>				
						</div>
						<span style="color: red; font-size: 18px;">
							<?php
								if(isset($addcart)){
									echo $addcart;
								}
							?>
						</span>
					</div>
					<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $prdRow['description']?></p>
			    	</div>
				
				</div>
			<?php } } ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
				      <li><a href="productbycat.php">Desktop</a></li>
				      <li><a href="productbycat.php">Laptop</a></li>
				      <li><a href="productbycat.php">Accessories</a></li>
				      <li><a href="productbycat.php#">Software</a></li>
					   <li><a href="productbycat.php">Sports & Fitness</a></li>
					   <li><a href="productbycat.php">Footwear</a></li>
					   <li><a href="productbycat.php">Jewellery</a></li>
					   <li><a href="productbycat.php">Clothing</a></li>
					   <li><a href="productbycat.php">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.php">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.php">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php include 'inc/footer.php'; ?>
	