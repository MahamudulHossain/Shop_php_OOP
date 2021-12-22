<?php 
	include 'inc/header.php'; 
?>

<?php
	$cartObj = new CartData();
	//Redirecting when cart is empty
	$sid = session_id();
	$sessionRes = $cartObj->sessionCheck($sid);
	if(!$sessionRes){
		echo "<script>window.location.href = 'index.php'</script>";
	}
	//checking user logged in or not
	$loginChk = Session::get('cusLogin');
	if($loginChk != true){
		echo "<script>window.location.href = 'login.php'</script>";
	}

?>
<?php
	if(isset($_GET['payType']) && $_GET['payType'] == 'cod'){
		$cartObj = new CartData();
		$cusID = Session::get('cusId');
		$paymentCOD = $cartObj->paymentTypeCod($cusID);
		$delCartData = $cartObj->daleteCartData();

	}
?>
<style type="text/css">
	.payment-div{margin: auto;border: 1px solid gray;width: 650px; padding: 50px;height: 130px;}
	.payment-div a{width: 25px;height: 15px;background-color: gray; padding: 25px; text-decoration: none;font-size: 20px;font-weight: bold;color: black;text-align: center;margin-right: 65px;}
</style>
 <div class="main">
    <div class="content">
    	<h2>Payment Options</h2>
    	 <div class="payment-div">
    	 	<a href="?payType=cod">Cash On Delivary</a>
    	 	<a href="">Online payment</a>
    	 </div>	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
