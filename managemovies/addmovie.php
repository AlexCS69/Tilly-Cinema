<?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

include "sidenav.php";
include "topheader.php";

if(isset($_POST['btn_save']))
{
   $product_name=$_POST['product_name'];
   $product_price=$_POST['product_price'];
   $product_image=$_POST['product_image'];
   $duration=$_POST['duration'];
   $daterelease=$_POST['daterelease'];
   $category=$_POST['category'];
   $des=$_POST['des'];
   
// write_log($product_name);
// write_log($product_price);
// write_log($product_image);
// write_log($duration);
// write_log($daterelease);
// write_log($category);


   $sql="insert into producttb(product_name,product_price,product_image,duration,daterelease,category,des) values
   ('$product_name',$product_price,'$product_image',$duration,'$daterelease','$category','$des')";
 write_log($sql);
   mysqli_query($conn,$sql)
  //  mysqli_query($conn,"insert into items(product_name,product_price,product_image,duration,daterelease,category,des) values
  //  ('$product_name',$product_price,'$product_image',$duration,'$daterelease','$category','$des')")
   			or die ("SQL Insert FAILED!");
   header("location: movielist.php");
   mysqli_close($conn);
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Movie</h4>
                </div>
                <div class="card-body">
                  <form action="addmovie.php" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Movie Name</label>
                          <input type="text" id="product_name" name="product_name" class="form-control" required>
                        </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" name="product_price" id="product_price"  class="form-control" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <input type="text" name="product_image" id="product_image" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Category</label>
                          <input type="text" id="category" name="category" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                           <div class="form-group bmd-form-group">
                             <label class="bmd-label-floating">Release Date</label>
                             <input type="text" id="daterelease" name="daterelease" class="form-control" required>
                           </div>
                       </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Movie Duration (minutes)</label>
                          <input type="text" name="duration" id="duration" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Image</label>
                          <input type="text" id="product_image" name="product_image" class="form-control" required>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!--<div class="card-body">-->

                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add Movie</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>
