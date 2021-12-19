<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$proObj = new FrontProduct();
					$proOfIphone = $proObj->productIphone();
					if($proOfIphone){
						while($res = $proOfIphone->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="productDetails.php?fPdId=<?php echo $res['productId']?>"> <img src="admin/<?php echo $res['image']?>" alt="Image" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $res['productName']?></p>
						<div class="button"><span><a href="productDetails.php?fPdId=<?php echo $res['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			<?php } } ?>
			<?php
					$proOfSamsung = $proObj->productSamsung();
					if($proOfSamsung){
						while($res = $proOfSamsung->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="productDetails.php?fPdId=<?php echo $res['productId']?>"> <img src="admin/<?php echo $res['image']?>" alt="Image" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $res['productName']?></p>
						  <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $res['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
		<?php } } ?>
		<?php
					$proOfAcer = $proObj->productAcer();
					if($proOfAcer){
						while($res = $proOfAcer->fetch_assoc()){

				?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="productDetails.php?fPdId=<?php echo $res['productId']?>"> <img src="admin/<?php echo $res['image']?>" alt="Image" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $res['productName']?></p>
						  <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $res['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   	<?php } } ?>
		<?php
					$proOfCanon = $proObj->productCanon();
					if($proOfCanon){
						while($res = $proOfCanon->fetch_assoc()){

				?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="productDetails.php?fPdId=<?php echo $res['productId']?>"> <img src="admin/<?php echo $res['image']?>" alt="Image" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p><?php echo $res['productName']?></p>
						  <div class="button"><span><a href="productDetails.php?fPdId=<?php echo $res['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			<?php } } ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	