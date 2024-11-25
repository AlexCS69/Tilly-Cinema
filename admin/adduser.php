 <?php
session_start();
include("../includes/dbhandler.php");
include("../includes/functions.php");

include "sidenav.php";
include "topheader.php";

if(isset($_POST['btn_save']))
{
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $cfmpassword=$_POST['cfmpassword'];
   $priviledge_level=$_POST['priviledge_level'];

   if (!matchPassword($password,$cfmpassword)){
      header("Location: adduser.php?error=PasswordsDoNotMatch");
      exit();
   }

   mysqli_query($conn,"insert into members (username,email,password,priviledge_level) values ('$username','$email','$password','$priviledge_level')")
            or die ("SQL Insert FAILED!");
   header("location: index.php");
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
                  <h4 class="card-title">Add User</h4>
                </div>
                <div class="card-body">
                  <form action="adduser.php" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">User Name</label>
                          <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                      </div>
                   </div>

                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" id="email"  class="form-control" required>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                      </div>
                   </div>

                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="text" id="cfmpassword" name="cfmpassword" class="form-control" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Privilege Level</label>
                          <input type="text" id="priviledge_level" name="priviledge_level" class="form-control" required>
                        </div>
                      </div>
                    </div>


                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add User</button>
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
