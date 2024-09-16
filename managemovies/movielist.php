<?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete'){
  $id=$_GET['id'];
  ///////picture delete/////////
  $result=mysqli_query($conn,"select product_image from producttb where id='$id'")
  or die("SQL Select FAILED!");

  list($picture)=mysqli_fetch_array($result);
  $path="../images/$picture";

  if(file_exists($path)==true)
  {
    unlink($path);
  }
  else
  {}
  /*this is delete query*/
  mysqli_query($conn,"delete from producttb where id='$id'")or die("SQL Delete FAILED!");
}

include "sidenav.php";
include "topheader.php";
?>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-14">
                  <div class="card ">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title"> Movie List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table tablesorter " id="page1">
                              <thead class=" text-primary">
                                <tr><th>Image</th>
                                  <th>Movie name</th>
                                  <th>Category</th>
                                  <th>Price</th>
                                  <th>Duration</th>
                                  <th>Release Date</th>
                                  <th>Description</th>
                                  <th><a class=" btn btn-primary" href="addmovie.php">Add New</a></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

$sql="select id,product_name,product_price,product_image,duration,daterelease,category,des from producttb order by product_name";          
$result=mysqli_query($conn,$sql)or die ("SQL Select FAILED!");

                                  while(list($id,$product_name,$product_price,$product_image,$duration,$daterelease,$category,$des)=mysqli_fetch_array($result))
                                  {
                                    echo "<tr>
                                            <td><img src='../images/$product_image' style='width:50px; height:50px; border:groove #000'></td>
                                            <td>$product_name</td>
                                            <td>$category</td>
                                            <td>$product_price</td>
                                            <td>$duration</td>
                                            <td>$daterelease</td>
                                            <td>$des</td>
                                      
                                            <td>
                                                <a href='editmovielist.php?id=$id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Movie'>
                                                <i class='material-icons'>edit</i>
                                                <div class='ripple-container'></div></a>
                                                <a href='movielist.php?id=$id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Movie'>
                                                <i class='material-icons'>close</i>
                                                <div class='ripple-container'></div></a>
                                            </td>
                                          </tr>";
                                  }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

<?php
include "footer.php";
?>
