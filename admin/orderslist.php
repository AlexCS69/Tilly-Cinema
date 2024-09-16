<?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete'){
  $product_id=$_GET['id'];
  ///////picture delete/////////
  $result=mysqli_query($conn,"select product_image from items where id='$product_id'")
  or die("SQL Select FAILED!");

  list($picture)=mysqli_fetch_array($result);
  $path="../upload/$picture";

  if(file_exists($path)==true)
  {
    unlink($path);
  }
  else
  {}
  /*this is delete query*/
  mysqli_query($conn,"delete from items where id='$product_id'")or die("SQL Delete FAILED!");
}

///pagination

//$page=$_GET['page'];

// if($page=="" || $page=="1")
// {
// $page1=0;
// }
// else
// {
// $page1=($page*10)-10;
// }
include "sidenav.php";
include "topheader.php";
?>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-14">
                  <div class="card ">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title"> Customer Orders List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table tablesorter " id="page1">
                              <thead class=" text-primary">
                                <tr><th>Order ID</th>
                                  <th>User ID</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Total Amt (RM)</th>
                                  <th>Order Date</th>
                                  <th>Delivered Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                $sql='select a.order_id,a.account_id,b.first_name, b.last_name,a.total_amt,a.order_date,a.delivered_date, b.email,b.mobile
                                from orders a, user_info b 
                                where a.account_id=b.user_id
                                order by b.first_name, b.last_name,a.order_id';

                                $result=mysqli_query($conn,$sql)or die ("SQL Select FAILED!");

                                  while(list($order_id,$account_id,$first_name,$last_name,$total_amt,$order_date,$delivered_date)
                                    =mysqli_fetch_array($result))
                                  {
                                    $order_date2=substr($order_date,6).'/'.substr($order_date,4,2).'/'.substr($order_date,0,4);
                                    $delivered_date2=substr($delivered_date,6).'/'.substr($delivered_date,4,2).'/'.substr($delivered_date,0,4);
                                    $total_amt2=number_format($total_amt);

                                    echo "<tr>
                                    <td>$order_id</td>
                                    <td>$account_id</td>
                                    <td>$first_name</td>
                                    <td>$last_name</td>

                                    <td>$total_amt2</td>
                                    <td>$order_date2</td>
                                    <td>$delivered_date2</td>
                                    

                                            <td>
                                                <a href='editorderslist.php?order_id=$order_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Item'>
                                                <i class='material-icons'>edit</i>
                                                <div class='ripple-container'></div></a>
                                                <a href='itemlist.php?order_id=$order_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Item'>
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
