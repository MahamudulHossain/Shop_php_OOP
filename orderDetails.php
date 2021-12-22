<?php 
	include 'inc/header.php'; 
?>

<?php
	$cartObj = new CartData();
	
	//Checking customer logged in or not
	$loginChk = Session::get('cusLogin');
	if($loginChk != true){
		echo "<script>window.location.href = 'login.php'</script>";
	}
?>
<style>
	.orderPage h2{color: green;font-size: 22px;font-weight: bold;}
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="orderPage">
			    	<h2>Your order Details</h2>
						<table class="tblone">
							<tr>
								<th>S .No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
							<?php 
								$fm = new Format();
								$cartObj = new CartData();
    							$cmrId = Session::get('cusId');
								$orderedData = $cartObj->orderedAllData($cmrId);
							?>
							<?php
								if($orderedData){
									$i = 1;
									while($cartRow = $orderedData->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $cartRow['productName']?></td>
								<td><a href="admin/<?php echo $cartRow['image']?>" target="_blank"><img src="admin/<?php echo $cartRow['image']?>" alt="image"/></a></td>
								<td><?php echo $cartRow['quantity'];?></td>
								<td>$<?php echo $cartRow['quantity']*$cartRow['price'];?></td>
								<td><?php echo $fm->formatDate($cartRow['odate']);?></td>
								<td><?php 
									if($cartRow['status'] == 0){
										echo "Pending";
									}else{
										echo "Shifted";
									}
								
								?></td>
							</tr>
						<?php } } ?>
						</table>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
