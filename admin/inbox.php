<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include_once '../classes/AdminOrder.php';
    $adOrObj = new AdminOrder();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order Details</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Customar Details</th>
							<th>Order Details</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getOrderDetails = $adOrObj->getOrderDetails();
						if($getOrderDetails){
							$i=1;
							while($res = $getOrderDetails->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td>Click Here</td>
							<td>
								<?php 
								$id = $res['cmrId'];
									$uniqueDate = $adOrObj->uniqueDate($id);
									if($uniqueDate){
										while($resu = $uniqueDate->fetch_assoc()){
											$uDate =  $resu['odate'];
											$allData = $adOrObj->allDate($id,$uDate);
											if($allData){
												echo "<table><tr><th>Name</th><th>Quantity</th><th>Price</th></tr>";
												while($resul = $allData->fetch_assoc()){
													echo "<tr>";
													echo "<td>".$resul['productName']."</td>";
													echo "<td>".$resul['quantity']."</td>";
													echo "<td>".$resul['price']."</td>";
													echo "<tr>";

												}
												echo "</table>";
											}
										}
									}

								?>
							</td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>
					<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
