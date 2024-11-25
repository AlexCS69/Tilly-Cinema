<?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

$id=$_REQUEST['id'];

$sql="select id,product_name,product_price,product_image,duration,daterelease,category,des from producttb where id='$id'";
$result=mysqli_query($conn,$sql) or die ("SQL Select FAILED.");
list($id,$product_name,$product_price,$product_image,$duration,$daterelease,$category,$des) = mysqli_fetch_array($result);

if(isset($_POST['btn_save']))
{

  $product_name=$_POST['product_name'];
  $product_price=$_POST['product_price'];
  $product_image=$_POST['product_image'];
  $duration=$_POST['duration'];
  $daterelease=$_POST['daterelease'];
  $category=$_POST['category'];
  $des=$_POST['des'];

  $sql="update producttb set product_name='$product_name', product_price=$product_price, product_image='$product_image',
  duration=$duration,daterelease='$daterelease',category='$category',des='$des' where id=$id";
  mysqli_query($conn,$sql) or die("SQL Update FAILED!");

  header("location: movielist.php");
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
              <form action="editmovielist.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">

                  <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Movie Name</label>
                        <input type="text" id="product_name" name="product_name"  class="form-control" value="<?php echo $product_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">

                        <label>Movie Price</label>
                        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Description</label>
                        <input type="text" name="des" id="des"  class="form-control" value="<?php echo $des;
                        ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" id="category" name="category"  class="form-control" value="<?php echo $category; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Release Date</label>
                        <input type="text" id="daterelease" name="daterelease"  class="form-control" value="<?php echo $daterelease; ?>" >
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Duration</label>
                        <input type="text" id="duration" name="duration"  class="form-control" value="<?php echo $duration; ?>" >
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
                        echo " <img src='../images/$product_image' style='width:100px; height:100px; border:groove #000' >"
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
