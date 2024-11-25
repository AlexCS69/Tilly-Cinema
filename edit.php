<?php
include("jslogin.php");
include("config.php");
	if(isset($_POST["updateBtn"])){
		$id = $_POST['movieID'];
		$name = $_POST['name'];
		$duration = $_POST["duration"];
		$date = $_POST['date'];
		$des = $_POST["des"];
		$feedback = $_POST["feedback"];
  
		$sql = "UPDATE movie SET name='$name', duration='$duration', date='$date',
		  des='$des', feedback='$feedback' WHERE movieID=$id;";
		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>alert('Record updated!'); window.location.href='view.php';</script>";
		}

	}

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- Custom Theme files -->
   <link href="css/styles.css" rel="stylesheet" media="all" type="text/css">
</head>

</head>
<body>
<?php
	include("config.php");
	$id = intval($_GET['movieID']); //intval — Get the integer value of a variable
	$result = mysqli_query($con,"SELECT * FROM movie WHERE movieID=$id");
  if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}else{
	while($row = mysqli_fetch_array($result))
	{
?>
<!-- ======= Header ======= -->
  <main>
  <form method="post" >
  <input type="hidden" name="movieID" value="<?php echo $row['movieID'] ?>">
    <!--Title-->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 fw-normal">Movie</h1>
        <h3>Edit movie's details</h3>
	<div class="section">
		<div class="label">
			Name
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["name"] ?>" name="name" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Duration
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["duration"] ?>" name="duration" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Date
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["date"] ?>" name="date" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Description 
		</div>
		<div class="field" >
			<textarea required="required" name="des"><?php echo $row["des"] ?></textarea>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Feedback
		</div>
        <div class="field" >
			<textarea required="required" name="feedback"><?php echo $row["feedback"] ?></textarea>
		</div>
	</div>
  <div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type="submit" class="btn" name="updateBtn">Update</button>
		</div>
	</div>
 </div>
</div>

</form>
<?php
  }
	}
	mysqli_close($con);
?>

  </main>
</body>
</html>