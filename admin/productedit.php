<?php include 'inc/header.php';?>
<?php 
    include 'inc/sidebar.php';
    include '../classes/Category.php';
    include '../classes/Brand.php';
    include '../classes/Product.php';

    $pdObj = new Product();
    if(!isset($_GET['proEid']) || $_GET['proEid'] == NULL){
        header('Location:catlist.php');
    }else{
        $id = $_GET['proEid'];
        $proData = $pdObj->proFind($id);

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updatePd = $pdObj->editProduct($_POST,$_FILES,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div>
            <?php if(isset($updatePd)){
                echo $updatePd;
                if($updatePd == "<span style='color:green; font-size:18px; font-weight:bold;'>Product Updated Successfully<span>"){

                    echo "<script>window.location = 'productlist.php'</script>";
                }
            }
        ?>
        </div>
        <?php
            if($proData){
                while($row = $proData->fetch_assoc()){
        ?>
        <div class="block">   

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $row['productName']?>" class="medium" required="required" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <?php

                            $cat = new Category();
                            $catData = $cat->cateAll();
                        ?>
                        <select id="select" name="catId" required="required">
                            <option value="">Select Category</option>
                            <?php
                                while($res = $catData->fetch_assoc()){
                                  if($res['catId'] == $row['catId']){
                            ?>
                                <option value="<?php echo $res['catId']?>" selected="selected"><?php echo $res['catName']?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $res['catId']?>"><?php echo $res['catName']?></option>
                            <?php } } ?>    
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <?php

                            $brand = new Brand();
                            $brandData = $brand->brandAll();
                        ?>
                        <select id="select" name="brandId" required="required">
                            <option value="">Select Brand</option>
                            <?php
                                while($res = $brandData->fetch_assoc()){
                                  if($res['brandId'] == $row['brandId']){
                            ?>
                                <option value="<?php echo $res['brandId']?>" selected="selected"><?php echo $res['brandName']?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $res['brandId']?>"><?php echo $res['brandName']?></option>
                            <?php } } ?> 
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" rows=10 cols=60 required ><?php echo $row['description']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $row['price']?>" required="required"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" /><br>
                        <img src="<?php echo $row['image']?>" width="120px" height="80px">
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type" required="required">
                            <option value="">Select Type</option>
                            <?php if($row['type'] == 0){?>
                            <option value="0" selected="selected">General</option>
                            <option value="1">Featured</option>
                        <?php } else{ ?>
                            <option value="0">General</option>
                            <option value="1" selected="selected">Featured</option>
                        <?php } ?>    
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <?php } } ?>
    </div>
</div>

<?php include 'inc/footer.php';?>


