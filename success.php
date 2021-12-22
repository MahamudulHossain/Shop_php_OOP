<?php 
	include 'inc/header.php'; 
	$loginChk = Session::get('cusLogin');
	if($loginChk != true){
		echo "<script>window.location.href = 'login.php'</script>";
	}
?>

<style type="text/css">
	.success_msg{margin: auto;border: 1px solid gray; border-radius: 50px 20px;width: 650px;height: 180px;padding: 10px;}
	.success_msg h2{color: green;font-size: 18px;text-align: center}
	.success_msg p{font-size: 18px;text-align: center}
</style>
 <div class="main">
    <div class="content">
    	<div class="success_msg">
    		<h2>Congrats! Your Order Placed Successfully</h2>
    		<?php
    			$cartObj = new CartData();
    			$cmrId = Session::get('cusId');
    			$amount = $cartObj->payableAmount($cmrId);
    			if($amount){
    				$sum = 0;
    				$vat = 0;
    				$gp = 0;
    				while($res = $amount->fetch_assoc()){
    					$payPrice = $res['price'];
    					$sum += $payPrice;
    				}
    			}
    			$vat = $sum * 0.1;
				$gp = $sum + $vat;

    		?>
    		<p>Total payable amount: $ <?php echo $gp;?></p>
    		<p>We will contact with you ASAP. <a href="orderDetails.php">Click here</a> to see your order details</p>
    	</div>    	 
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
