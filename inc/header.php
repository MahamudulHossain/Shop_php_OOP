<?php
    include 'lib/Database.php';
    include 'helpers/Format.php';
    include 'lib/Session.php';
    include 'classes/FrontProduct.php';
    include 'classes/CartData.php';
    include 'classes/Registration.php';

    Session::init();
	  header("Cache-Control: no-cache, must-revalidate");
	  header("Pragma: no-cache"); 
	  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
	  header("Cache-Control: max-age=2592000");

	  //Autoloading all classes 
		// spl_autoload_register(function($class){
		// 	include_once "classes/". $class . ".php";
		// 	}); 

	  //Logout
	  if(isset($_GET['cid']) && $_GET['cid'] != null){
	  	Session::destroy();
	  }
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									<?php
									$cartDataObj = new CartData();
									$tP = $cartDataObj->totalCartData();
									if($tP){
										while($tPro = $tP->fetch_assoc()){
											echo $tPro['tProduct'];
										}
									}
									?>
								</span>
							</a>
						</div>
			      </div>
		   <div class="login">
		   	<?php 
		   		$loginInfo = Session::get('cusLogin');
				if($loginInfo){ ?>
					<a href="?cid=<?php echo Session::get('cusId')?>">Logout</a>

				<?php }else{ ?>
					<a href='login.php'>Login</a>
				<?php } ?>
		   	
		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>