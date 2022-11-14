<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{

// if (isset($_FILES['uploadfile'])){

	// $root = dirname(dirname(__DIR__));

	// $folder = $root.'/profiles/';
	// }

	
	// $source=$_FILES['uploadfile']['tmp_name'];
	// $filename=$_FILES['uploadfile']['name'];

	// $destination=$folder.$filename;
	// move_uploaded_file($source,$destination);


	
// $picture=$_POST['uploadfile'];
$name=$_POST['name'];
$username=$_POST['username'];
// $hostel=$_POST['hostel'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=md5($_POST['password']);

// $query="insert into dean(name, username,email, phone, password) 
// values('$name','$username','$email','$phone','$password')";
// $stmt = mysqli_query($mysqli,$query);
// if ($stmt==TRUE) {
//     # code...
//     echo"<script>alert('Dean has been added successfully');</script>";

	
// }else(mysqli_num_rows($stmt)>0){
// 	echo"<script>alert('Dean already exists or user already booked ');</script>";
// }
//checking con
$check="SELECT * FROM dean WHERE name= '$name' or email='$email'";
$result=$mysqli->query($check) or die(mysqli_error($check));
if (mysqli_num_rows($result)>0){
	echo"<script>alert('Dean already exists ');</script>";
}else{
	$query="insert into dean(name, username,email, phone, password) 
	values('$name','$username','$email','$phone','$password')";
	$result = mysqli_query($mysqli,$query);
	$result->execute();
	echo"<script>alert('Dean has been added successfully');</script>";

}

}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Add Dean Of Students</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Dean Of Students</h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add Dean Of Students</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Name</label>
												<div class="col-sm-8">
													<input type="text" value="" name="name"  class="form-control"> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Username</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="username" id="cns" value="" required="required">
						 
												</div>

												
												</div>

												<!-- <div class="form-group">
										<label class="col-sm-2 control-label">Picture of the Hostel</label>
										<div class="col-sm-8">
										<input type="file" class="form-control" name="uploadfile" value="" >
									</div>
											</div> -->
                                    <div class="form-group">
									<!-- <label class="col-sm-2 control-label">Hostel Name</label> -->
									<!-- <div class="col-sm-8">
									<input type="text" class="form-control" name="hostel" value="" >
												</div>
									 -->
									
											</div>
                                            <div class="form-group">
									<label class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="email" value="" >
												</div>
											</div>
                                            <div class="form-group">
									<label class="col-sm-2 control-label">Phone</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="phone" value="" >
												</div>
											</div>
                                            <div class="form-group">
									<label class="col-sm-2 control-label">password</label>
									<div class="col-sm-8">
									<input type="password" class="form-control" name="password" value="" >
												</div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Add Dean">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>