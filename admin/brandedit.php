<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Brand.php';

    $brandObj = new Brand();
    if(!isset($_GET['brandEid']) || $_GET['brandEid'] == NULL){
        header('Location:brandlist.php');
    }else{
        $id = $_GET['brandEid'];
        $brandData = $brandObj->brandFind($id);

    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandNameUpdate = $_POST['brandNameUpdate'];
        $updateBrand = $brandObj->updateBrand($brandNameUpdate,$id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
               <div class="block copyblock"> 
                <?php 
                    if(isset($updateBrand)){
                        echo $updateBrand;
                        $URL="brandlist.php";
                        echo "<script>location.href='$URL'</script>";
                    }
                    if($brandData){
                        while($row = $brandData->fetch_assoc()){

                ?>
                 <form  method="post" action="">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandNameUpdate" value="<?php echo $row['brandName']?>" class="medium" required="required" />
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