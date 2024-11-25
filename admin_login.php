<?php
session_start();
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password sent from Form
	$name=mysqli_real_escape_string($con,$_POST['aname']); 
	$password=mysqli_real_escape_string($con,$_POST['password']); 

	$sql="SELECT adminID FROM admins WHERE aname='$name'and password='$password'";
	if ($result=mysqli_query($con,$sql))  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);	  
	}
	
	while($row=mysqli_fetch_array($result)){
		$adminID = $row['adminID'];
	}
	
	if($rowcount==1)  {	
		$_SESSION['mySession']=$name;
		header("location: admin_homepage.php");
	}
	else  {
		echo '<script>alert("Your Login Name or Password is invalid. Please re login");</script>';
	}
	mysqli_close($con);
}
?>
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Admin Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="login_register/css/my-login.css" rel="stylesheet" media="all" type="text/css">

    <!-- web font -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
<body>
	<!-- main -->
	<div class="my-login-page">
		<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="login_register/img/logo.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
						<h4 class="card-title">Admin Login</h4>
                        <form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="aname">Name</label>
									<input id="aname" type="text" class="form-control" name="aname" value =""required autofocus>
									<div class="invalid-feedback">
										Name is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" id="login" name="submitBtn">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="admin_register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>		
        </div>
        </section>
	</div>
	<!-- //main -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>