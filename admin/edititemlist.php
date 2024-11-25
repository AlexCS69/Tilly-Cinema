
    <?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

$id=$_REQUEST['id'];

$result=mysqli_query($conn,"select itemdesc,description,sellingprice,QuantityInStock,product_image from items where id='$id'")or die ("SQL Select FAILED.");

list($itemdesc,$description,$sellingprice,$QuantityInStock,$product_image)=mysqli_fetch_array($result);

if(isset($_POST['btn_save']))
{

$itemdesc=$_POST['itemdesc'];
$description=$_POST['description'];
$sellingprice=$_POST['sellingprice'];
$QuantityInStock=$_POST['QuantityInStock'];
$product_image=$_POST['product_image'];

$sql="update items set itemdesc='$itemdesc', description='$description', sellingprice=$sellingprice,
QuantityInStock=$QuantityInStock,product_image='$product_image' where id=$id";

write_log($sql);

mysqli_query($conn,$sql) or die("SQL Update FAILED!");

//mysqli_query($conn,"update items set itemdesc='$itemdesc', description='$description', sellingprice=$sellingprice,
//QuantityInStock=$QuantityInStock,product_image='$product_image' where id=$id") or die("SQL Update FAILED!");

header("location: itemlist.php");
mysqli_close($conn);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Item</h5>
              </div>
              <form action="edititemlist.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">

                  <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" id="itemdesc" name="itemdesc"  class="form-control" value="<?php echo $itemdesc; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">

                        <label>Description</label>
                        <input type="text" id="description" name="description" class="form-control" value="<?php echo $description; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Selling Price</label>
                        <input type="text" name="sellingprice" id="sellingprice"  class="form-control" value="<?php echo strval($sellingprice);
//write_log($sellingprice);
                        ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="text" id="QuantityInStock" name="QuantityInStock"  class="form-control" value="<?php echo $QuantityInStock; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Image Location</label>
                        <input type="text" id="product_image" name="product_image"  class="form-control" value="<?php echo $product_image; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <?php
                        echo " <img src='../upload/$product_image' style='width:100px; height:100px; border:groove #000' >"
                      ?>

                      </div>
                    </div>




              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>
            </div>
          </div>


        </div>
      </div>
      <?php
include "footer.php";
?>
