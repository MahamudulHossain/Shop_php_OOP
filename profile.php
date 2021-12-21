<?php 
	include 'inc/header.php'; 
	$userLoginCkh = Session::get('cusId');
	  	if(!$userLoginCkh){
	  		header('Location:index.php');
	  	}	
?>
<style type="text/css">
	.proTbl{width:650px;}
	.proTbl tr th{font-weight: bold;width: 20%; border-right: 2px solid #afa5a5;}
</style>
 <div class="main">
    <div class="content">
     <div class="proTbl">	 	
       <table class="table table-success">
		  <tbody>
		  	<?php 
		  		$regObj = new Registration();
		  		$userID = Session::get('cusId');
		  		$userData = $regObj->getUserInfo($userID);
		  		if($userData){
		  			while($res = $userData->fetch_assoc()){
		  	?>

			    <tr>
			      <th>Name</th>		
			      <td scope="row"><?php echo $res['name']?></td>
			    </tr>  
			    <tr>
			      <th>Email</th>		
			      <td scope="row"><?php echo $res['email']?></td>
			    </tr>
			    <tr>
			      <th>Address</th>		
			      <td scope="row"><?php echo $res['address']?></td>
			    </tr>
			    <tr>
			      <th>Zip</th>		
			      <td scope="row"><?php echo $res['zip']?></td>
			    </tr>
			    <tr>
			      <th>Phone</th>		
			      <td scope="row"><?php echo $res['phone']?></td>
			    </tr>
			    <tr>
					<td colspan="2"><a href="updateProfile.php?cID=<?php echo $res['userId']?>"><button class="btn btn-primary">Update Profile</button></a></td>
				</tr>
			<?php } } ?>
		  </tbody>
		</table>
	 </div>	
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
