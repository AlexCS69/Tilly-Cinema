<?php
	include("jslogin.php");
    include("config.php");
    
    error_reporting(0);
    if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete'){
      $movieID=$_GET['movieID'];
      ///////picture delete/////////
      $result=mysqli_query($conn,"select movieID from movie where id='$movieID'")
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
      mysqli_query($conn,"delete from movie where id='$movieID'")or die("SQL Delete FAILED!");
    }
?>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
          '<td><input type="text" class="form-control" name="name" id="name"></td>' +
          '<td><input type="text" class="form-control" name="duration" id="duration"></td>' +
          '<td><input type="text" class="form-control" name="date" id="date"></td>' +
          '<td><input type="text" class="form-control" name="des" id="des"></td>' +
		  '<td><input type="text" class="form-control" name="feedback" id="feedback"></td>' +
		  '<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
});
</script>
<style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin view page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<!-- ======= Header ======= -->
<?php
  include "admin_header.php";
  ?>
<!-- End Header -->


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
    <div class="container-fluid">

    <div class="row justify-content-center">
          <div class="col-xl-10">
            <ol>
              <li><a href="admin_homepage.php">Home</a></li>
              <li>View all Movie</li>
            </ol>
            <h2>View all Movie</h2>
          </div>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <section class="inner-page">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10">
    <?php
    include("config.php");
    $result=mysqli_query($con,"SELECT * FROM movie");
    ?>
    <div class="parentbox">
    <?php 
	while($row=mysqli_fetch_array($result)){?>
		<div class="container-lg">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8"><h2>Movies <b>Details</b></h2></div>
						<div class="col-sm-4">
						</div>
					</div>
				</div>
				<table class="table table-bordered">
                <thead>
                    <tr>
					    <th>Movie Name</th>
                        <th>Duraton</th>
                        <th>Date</th>
                        <th>Description</th>
						<th>Feedback</th>
                    </tr>
                </thead>
				<tbody>
                    <tr>
					    <th><?php echo $row['name'];?></th>
                        <th><?php echo $row['duration'];?></th>
                        <th><?php echo $row['date'];?></th>
                        <th><?php echo $row['des'];?></th>
						<th><?php echo $row['feedback'];?></th>
                        <td>
						<a class="edit" href="edit.php?movieID=<?php echo $row['movieID'];?>">Edit</a> 
                        <a href='view.php?id=$movieID&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Item'>
                        </td>
                    </tr>
            </table>
        </div>
	<?php
	}
	mysqli_close($conn);//to close the database connection?>	
    </div>
 
</body>
</html>
</div>     
</body>
</html>
    
