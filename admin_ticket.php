<?php
if (isset($_POST['submitBtn'])) {
	include("config.php");
          
	$sql = "INSERT INTO movie (name,duration, date,des,feedback)
	VALUES ('$_POST[name]' ,'$_POST[duration]','$_POST[date]','$_POST[des]','$_POST[feedback]')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<script>alert("Successfully updated!");
		window.location.href= "view.php";
		</script>';
	}

	mysqli_close($con);
}

 ?>
 
 <!DOCTYPE html>
<html>
<head>
	<title>Add Movie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 
    <!-- Custom Theme files -->
    <link href="assest/css/styles.css" rel="stylesheet" media="all" type="text/css">

    <!-- web font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
</head>
|<body>
<?php
  include "admin_header.php";
  ?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Add Movie</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="admin_ticket.php" method="post" enctype="multipart/form-data">
					
                    </br>
					</br>
					<label for="movie"><b>Add Movie</b></label>
				    </br>
					</br>
                    <input class="text " type="text" name="name" placeholder="name" id="name"required>
					</br>
					</br>
                    <input class="text " type="text" name="duration" placeholder="duration" id="duration"required>
					</br>
					</br>
		            </div>
					<input class="text " type="text" name="date" placeholder="date" id="date"required>
					</br>
					</br>

					<input class="text" type="text" name="des" placeholder="des" id="des" required>
					</br>
					</br>

					<input class="textarea" type="text" name="feedback" placeholder="feedback" id="feedback" required>
					</br>
					</br>
				
					<div class="field">
					<input class="btn btn-primary" type="submit" name="submitBtn" value="Add">
                    </div>
					</form>				
				</form>
			</div>
		</div>
       
</body>
</html>
