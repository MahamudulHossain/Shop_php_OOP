<?php include 'inc/header.php';?>
<?php 
    include 'inc/sidebar.php';
    include '../classes/Category.php';
    include '../classes/Brand.php';
    include '../classes/Product.php';

    $pdAdd = new Product();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $addPd = $pdAdd->addProduct($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div>
            <?php if(isset($addPd)){
                echo $addPd;
            }
        ?>
        </div>
        <div class="block">   

         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" required="required" />
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
                            ?>
                            <option value="<?php echo $res['catId']?>"><?php echo $res['catName']?></option>
                            <?php } ?>
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
                            ?>
                            <option value="<?php echo $res['brandId']?>"><?php echo $res['brandName']?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" rows=10 cols=60 required ></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" required="required"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" required="required" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type" required="required">
                            <option value="">Select Type</option>
                            <option value="0">General</option>
                            <option value="1">Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


