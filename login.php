<?php include 'inc/header.php'; ?>
<?php

	$regObj = new Registration();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $registerData = $regObj->userRegistration($_POST);
    }
	
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
                    </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<div>
    			<?php
    			if(isset($registerData)){
    				echo $registerData;
    			}
    		?>
    		</div>
    		<form action="" method="post">
	   			 <table>
	   				<tbody>
					<tr>
					<td>
						<div>
						<input type="text" name="name" placeholder="Enter your name" required="required">
						</div>
						
						<div>
						   <input type="text" name="email" placeholder="Enter your email" required="required">
						</div>
						
						<div>
							<input type="text" name="address" placeholder="Enter your address" required="required">
						</div>
						
	    			 </td>
	    			<td>

					<div>
						<input type="text" name="phone" placeholder="Enter your phone" required="required">
					</div>	 
			  
					 <div>
						<input type="text" name="zip" placeholder="Enter area zip code" required="required">
					</div>

					<div>
						<input type="text" name="password" placeholder="Set password" required="required">
					</div>
		    	</td>
			    </tr> 
			    </tbody>
			</table> 
		   <div class="search"><div><button class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
