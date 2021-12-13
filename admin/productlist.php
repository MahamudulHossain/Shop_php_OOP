<?php 
	include 'inc/header.php';
 	include 'inc/sidebar.php';

    include_once '../classes/Category.php';
    include_once '../classes/Brand.php';
    include_once '../classes/Product.php';
    include_once '../helpers/Format.php';

    $pdObj = new Product();
    $fmObj = new Format();
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$proData = $pdObj->productAll();
					if($proData){
						$i=1;
						while($res = $proData->fetch_assoc()){
					
				?>
					<tr class="odd gradeX">
						<td><?php echo $i++;?></td>
						<td><?php echo $res['productName'];?></td>
						<td><?php echo $res['catName'];?></td>
						<td><?php echo $res['brandName'];?></td>
						<td><?php echo $fmObj->textShorten($res['description'], 60);?></td>
						<td>$<?php echo $res['price'];?></td>
						<td><a href="<?php echo $res['image'];?>" target="_blank"><img src="<?php echo $res['image'];?>" width="50px" height="50px"></a></td>
						<td><?php echo $res['type'];?></td>
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
