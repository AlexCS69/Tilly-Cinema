
<?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];

    // First run.
    $sql='select a.order_id,a.account_id,b.first_name, b.last_name,a.total_amt,a.order_date,a.delivered_date, b.email,b.mobile
    from orders a, user_info b 
    where a.account_id=b.user_id and a.order_id='.$order_id.' order by b.first_name, b.last_name,a.order_id';
    write_log($sql);


    $result=mysqli_query($conn,$sql) or die ("SQL Select FAILED!");
    list($order_id,$account_id,$first_name,$last_name,$total_amt,$order_date,$delivered_date,$email,$mobile)=mysqli_fetch_array($result);
  }


// Second run.
if(isset($_POST['btn_save'])) {

    $dlvdate=$_POST['delivered_date'];    //user input: dd-mm-yyyy
    $order_id=$_POST['order_id'];
    
    $dd=substr($dlvdate,0,2);
    $mm=substr($dlvdate,3,2);
    $yyyy=substr($dlvdate,6,4);

    $delivered_date=($yyyy.$mm.$dd);
    
    mysqli_query($conn,"update orders set delivered_date='$delivered_date' where order_id=$order_id") or die("SQL Update FAILED!");

    header("location: orderslist.php");
    mysqli_close($conn);
}
include "sidenav.php";
include "topheader.php";

//write_log('orderid2-'.order_id);
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Order</h5>
              </div>
              <form action="editorderslist.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">

                    <input  type="hidden" name="id" value="<?php echo $order_id; ?>">
                    
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" name="order_id"  class="form-control" value="<?php echo $order_id; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">

                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"  disabled>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">

                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"  disabled>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Total Amount</label>
                        <input type="text" name="total_amt"  class="form-control" value="<?php echo number_format($total_amt,2); ?>"  disabled>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Order Date (dd-mm-yyyy)</label>
                        <input type="text" name="order_date"  class="form-control" value="<?php echo substr($order_date,6).'/'.substr($order_date,4,2).'/'.substr($order_date,0,4); ?>"  disabled>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Delivered Date  (dd-mm-yyyy)</label>
                        <input type="text"  name="delivered_date"  class="form-control" value="<?php echo substr($delivered_date,6).'/'.substr($delivered_date,4,2).'/'.substr($delivered_date,0,4); ?>" >
                      </div>
                    </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="btn_save" class="btn btn-fill btn-primary">Update Order</button>
              </div>
              </form>
            </div>
          </div>


        </div>
      </div>
      <?php
include "footer.php";
?>
