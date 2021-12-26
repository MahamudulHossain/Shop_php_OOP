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
													$sum=0;
													$rowCount = 1;
												?>
												<table style="border:1px solid black;"><tr style="border:1px solid black;"><th>Name</th><th>Quantity</th><th>Price</th></tr>
													<?php
												while($resul = $allData->fetch_assoc()){?>
													<tr style="border:1px solid black;">
														<?php
													echo "<td>".$resul['productName']."</td>";
													echo "<td>".$resul['quantity']."</td>";
													echo "<td> $".$resul['price']."</td>";
													$sum += $resul['price'];
													$rowCount++;
													?>
													<tr style="border:1px solid black;">
														<?php
												}?>
												<?php
												$sum = $sum + $sum * 0.1;
												echo "Final Amount to Pay: $".$sum;

												echo "</table>";
											}
										}
									}

								?>
							</td>
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
