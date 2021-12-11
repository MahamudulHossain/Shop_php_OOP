<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Category.php';

    $catObj = new Category();
    if(isset($_GET['catDel']) && $_GET['catDel'] > 0){
    	$id = $_GET['catDel'];
    	$catRes = $catObj->catDel($id);
    }
    
?>    
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php 
                	if(isset($catRes)){
                		echo $catRes;
                	}
                ?>
					<tbody>
						<?php 
							$catData = $catObj->cateAll();
							if($catData){
								$i=1;
								while($row = $catData->fetch_assoc()){

						?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['catName'];?></td>
							<td><a href="catedit.php?catEid=<?php echo $row['catId'];?>">Edit</a> || <a onclick="return confirm('Are you sure?');" href="?catDel=<?php echo $row['catId'];?>">Delete</a></td>
						</tr>
						<?php
								}
							}else{
								echo "No Category Found.";
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

