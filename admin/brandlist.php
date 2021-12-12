<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Brand.php';

    $brandObj = new Brand();
    if(isset($_GET['brandDel']) && $_GET['brandDel'] > 0){
    	$id = $_GET['brandDel'];
    	$brandRes = $brandObj->brandDel($id);
    }
    
?>    
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
                	if(isset($brandRes)){
                		echo $brandRes;
                	}
                ?>
					<tbody>
						<?php 
							$brandData = $brandObj->brandAll();
							if($brandData){
								$i=1;
								while($row = $brandData->fetch_assoc()){

						?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['brandName'];?></td>
							<td><a href="brandedit.php?brandEid=<?php echo $row['brandId'];?>">Edit</a> || <a onclick="return confirm('Are you sure?');" href="?brandDel=<?php echo $row['brandId'];?>">Delete</a></td>
						</tr>
						<?php
								}
							}else{
								echo "No Brand Found.";
							}
						?>
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

