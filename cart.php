<?php include 'inc/header.php'; ?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="5%">S .No</th>
								<th width="25%">Product Name</th>
								<th width="15%">Image</th>
								<th width="10%">Price</th>
								<th width="15%">Quantity</th>
								<th width="10%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$cartObj = new CartData();
								$cartData = $cartObj->cartAllData();
							?>
							<?php
								if($cartData){
									$i = 1;
									$sum = 0;
									while($cartRow = $cartData->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $cartRow['productName']?></td>
								<td><a href="admin/<?php echo $cartRow['image']?>" target="_blank"><img src="admin/<?php echo $cartRow['image']?>" alt="image"/></a></td>
								<td>$ <?php echo $cartRow['price']?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="<?php echo $cartRow['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$ <?php 
									$tp =  $cartRow['quantity']* $cartRow['price'];
									echo $tp;
								?></td>
								<td><a href="">X</a></td>
							</tr>
							<?php 
								$sum+=$tp;
									}
									 } 
							?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td> &nbsp;&nbsp;&nbsp; 10% </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$ 
									<?php 
										$vat = $sum * 0.1;
										$gp = $sum + $vat;
										echo $gp;
									?>

								</td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
