<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Category.php';

    $catObj = new Category();
    if(!isset($_GET['catEid']) || $_GET['catEid'] == NULL){
        header('Location:catlist.php');
    }else{
        $id = $_GET['catEid'];
        $catData = $catObj->catFind($id);

    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cateNameUpdate = $_POST['cateNameUpdate'];
        $updateCat = $catObj->upadteCat($cateNameUpdate,$id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if(isset($updateCat)){
                        echo $updateCat;
                        $URL="catlist.php";
                        echo "<script>location.href='$URL'</script>";
                    }
                    if($catData){
                        while($row = $catData->fetch_assoc()){

                ?>
                 <form  method="post" action="">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cateNameUpdate" value="<?php echo $row['catName']?>" class="medium" required="required" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="Update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                 </form>
                 <?php

                       }
                    }else{
                        echo "<span style='color:red'><h1>Item Not Found</h1></span>";
                    }
                 ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>