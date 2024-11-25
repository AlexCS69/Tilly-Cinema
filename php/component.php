<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "

    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">
            
            <input type=\"hidden\" name=\"product_image\" value=\"$productimg\" /> 

            <div>
                    <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$productname</h5>
                    <h6>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"far fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        Some quick example text to build on the card.
                    </p>
                    <h5>
                        <small><s class=\"text-secondary\">$519</s></small>
                        <span class=\"price\">$$productprice</span>
                    </h5>
                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                    <input type='hidden' name='product_id' value='$productid'>
                    <input type='hidden' name='product_name' value='$productname'>
                    <input type='hidden' name='product_price' value='$productprice'>
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                               
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

    ";
    echo  $element;
}

function get_session_rows(){
    $row_delete=0;
    $mycount20=0;
    $mycount=count($_SESSION['cart']);

    for ($i=0; $i < $mycount; $i++) { 
        if(isset($_SESSION['cart'][$i][4])){
            if ($_SESSION['cart'][$i][4] == 0){
                $row_delete += 1;
            }
        }
    }
    return $mycount20=$mycount-$row_delete;
}

function product_already_exist($product_id){
    $pdt_exist=true;
    $mycount=count($_SESSION['cart']);

    for ($i=0; $i < $mycount; $i++) { 
        //[$i][4] - column 4 is the 1/0 value.
        if ($_SESSION['cart'][$i][0] == $product_id){
            if ($_SESSION['cart'][$i][4] == 0){
                unset($_SESSION['cart'][$i][4]);  //replace 0 with 1.
                $_SESSION['cart'][$i][4] =1;  //replace 0 with 1.
                
                $pdt_exist=false;
            }
        }
    }
    return $pdt_exist;
}

//--------------------------
function write_log($log_msg)
{
    $log_filename = "logs";
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/debug.log';
  file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}

function emptyInputLogin($email, $password) {
    return empty($email) or empty($password);
}


function uidExists($con, $email,$password) {
  $sql = "SELECT * FROM user_info where email = ? and password=?;";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql))   {
    header("location: ../login_form.php?Error=SQLStatementFailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $email,$password);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}

function loginUser($con, $email, $password)   {
   $error="";

    $uidExists = uidExists($con, $email, $password);

    if(!$uidExists){
      $error="User does not exist";

      return false;
   } else {
      session_start();
      $_SESSION['user_id']=$uidExists['user_id'];
      $_SESSION['email']=$uidExists['email'];
      $_SESSION['first_name']=$uidExists['first_name'];

      return true;
   }
   //  if (!$uidExists) {
   //    $error="User does not exist;
   //
   //    return false;
   // } else {
   //    session_start();
   //
   // }
}
