<?php 
	include 'inc/header.php'; 
	$userLoginCkh = Session::get('cusId');
	  	if(!$userLoginCkh){
	  		header('Location:index.php');
	  	}	

	  	if(!isset($_GET['cID']) || $_GET['cID'] <= 0){
        header('Location:profile.php');
	    }else{
	        $id = $_GET['cID'];
	        $regObj = new Registration();
	  		$userData = $regObj->getUserInfo($id);
	    }

	    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	$updatePro = $regObj->updateProfile($_POST,$id);
    	}
?>
<style type="text/css">
	.proTbl{width:650px;}
	.proTbl tr th{font-weight: bold;width: 20%; border-right: 2px solid #afa5a5;}
</style>
 <div class="main">
    <div class="content">
     <div class="proTbl">	
     <form action="" method="post"> 	
       <table class="table table-success">
		  <tbody>
		  	<?php
		  		if($userData){
		  			while($res = $userData->fetch_assoc()){
		  	?>

			    <tr>
			      <th>Name</th>	
			      <td scope="row"><input type="text" name="name" value="<?php echo $res['name']?>">
			      </td>
			    </tr>  
			    <tr>
			      <th>Email</th>		
			      <td scope="row"><input type="text" name="email" value="<?php echo $res['email']?>">
			      </td>
			    </tr>
			    <tr>
			      <th>Address</th>		
			      <td scope="row"><input type="text" name="address" value="<?php echo $res['address']?>">
			      </td>
			    </tr>
			    <tr>
			      <th>Zip</th>		
			      <td scope="row"><input type="text" name="zip" value="<?php echo $res['zip']?>">
			      </td>
			    </tr>
			    <tr>
			      <th>Phone</th>		
			      <td scope="row"><input type="text" name="phone" value="<?php echo $res['phone']?>">
			      </td>
			    </tr>
			    <tr>
					<td colspan="2"><button class="btn btn-primary" name="update">Update</button></td>
				</tr>
			<?php } } ?>
		  </tbody>
		</table>
	 </form>	
	 </div>	
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
