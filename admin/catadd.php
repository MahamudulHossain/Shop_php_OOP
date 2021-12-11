<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Category.php';

    $catAdd = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cateName = $_POST['cateName'];
        $addCat = $catAdd->addCat($cateName);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if(isset($addCat)){
                        echo $addCat;
                    }
                ?>
                 <form  method="post" action="catadd.php">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cateName" placeholder="Enter Category Name..." class="medium" required="required" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                 </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>