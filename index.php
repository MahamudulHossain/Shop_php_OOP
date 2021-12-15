<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	        <div class="section group">
	        <?php

	    	 	$pdObj = new FrontProduct();
	    	 	$fmObj = new Format();
	    	 	$pdData = $pdObj->allFeatData();

	    	 	if($pdData){
    	 			while($pdRow = $pdData->fetch_assoc()){
    		 ?>	
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="productDetails.php?fPdId=<?php echo $pdRow['productId']?>"><img src="admin/<?php echo $pdRow['image']?>" alt="Image" /></a>
					 <h2><?php echo $pdRow['productName']?></h2>
					 <p><?php echo $fmObj->textShorten($pdRow['description'],60)?></p>
					 <p><span class="price">$<?php echo $pdRow['price']?></span></p>
				     <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $pdRow['productId']?>" class="details">Details</a></span></div>
				</div>
			<?php 	}
    	 	}
    	 	?>	
	
			</div>
		
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			 <?php

	    	 	$pdNewData = $pdObj->allNewData();

	    	 	if($pdNewData){
    	 			while($pdNRow = $pdNewData->fetch_assoc()){
    		 ?>		
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="productDetails.php?fPdId=<?php echo $pdNRow['productId']?>"><img src="admin/<?php echo $pdNRow['image']?>" alt="Image" /></a>
					 <h2><?php echo $pdNRow['productName']?></h2>
					 <p><?php echo $fmObj->textShorten($pdNRow['description'],60)?></p>
					 <p><span class="price">$<?php echo $pdNRow['price']?></span></p>
				     <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $pdNRow['productId']?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>	
			</div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>

