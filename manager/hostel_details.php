<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if($_POST['submit'])
{
$hname=$_POST['hname'];
$location=$_POST['location'];
// $self=$_POST['self'];
// $doub1=$_POST['doub1'];
// $non=$_POST['non'];
// $fati=$_POST['fati'];
// // $non=$_POST['non'];
// $power=$_POST['power'];
// $water=$_POST['water'];
// $wifi=$_POST['wifi'];
// $solar=$_POST['solar'];
$checkbox1=$_POST["nature"];
$chk="";
foreach($checkbox1 as $n){
	$chk.=$n.",";
}

$services=$_POST['services'];
$chk2="";
foreach($services as $s){
	$chk2.=$s.",";
}

$cont=$_POST['cont'];
$sql="SELECT room_no FROM rooms where room_no=?";
$stmt1 = $mysqli->prepare($sql);
$stmt1->bind_param('i',$roomno);
$stmt1->execute();
$stmt1->store_result(); 
$row_cnt=$stmt1->num_rows;;
if($row_cnt>0)
{
echo"<script>alert('Room alreadt exist');</script>";
}
else
{
$query="insert into  about_hostel (hname,location,cont,nature_of_room,services_available) values(?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssiss',$hname,$location,$cont,$chk,$chk2);
$stmt->execute();
echo"<script>alert('Room has been added successfully');</script>";
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
	<title>Create Room</title>
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

					<h1></h1>
				
						<h2 class="page-title">About my hostel </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">About my hostel</div>
									<div class="panel-body">
									<?php if(isset($_POST['submit']))
{ ?>

<?php } ?>
<form method="post" class="form-horizontal">
	<!-- <div class="hr-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Room  </label>
		<div class="col-sm-8">
		<Select name="seater" class="form-control" required>
			<option value="">Select </option>
			<option value="1">Single </option>
			<option value="2">Double</option>

		</Select>
	</div>
	</div> -->
	<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="hname" id="rmno" value="" required="required">
</div>
</div> 

<div class="form-group">
<label class="col-sm-2 control-label">Location</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="location" id="rmno" value="" required="required">
</div>
</div> 

 <div class="hr-dashed"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label"> Nature of Rooms avalaible </label>
		<div class="col-sm-8">
			<input type="checkbox" class="custom-control-input" id="customCheck" name="nature[]" value="Self contained single rooms">
    		<label class="custom-control-label" for="customCheck" name = "self">Self contained single rooms</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="nature[]" value="Self contained double rooms">
    		<label class="custom-control-label" for="customCheck" name = "doub1">Self contained double rooms</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="nature[]" value="Non-self contained double rooms">
			<label class="custom-control-label" for="customCheck" name = "non">Non-self contained double rooms</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="nature[]" value="Non-self contained single rooms">
			<label class="custom-control-label" for="customCheck" name = "fati">Non-self contained single rooms</label><br>
		<!-- <Select name="seater" class="form-control" required>
			<option value="">Select </option>
			<option value="1">Self contained and single rooms </option>
			<option value="2">Self contained and double rooms</option>

		</Select> -->
	</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label"> Services available </label>
		<div class="col-sm-8">
			<input type="checkbox" class="custom-control-input" id="customCheck" name="services[ ]" value="Electricity">
    		<label class="custom-control-label" for="customCheck" name = "power">Electricity</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="services[ ]" value="Tap water">
    		<label class="custom-control-label" for="customCheck" name = "water">Tap water</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="services[ ]" value="wifi">
			<label class="custom-control-label" for="customCheck" name = "wifi">wi-fi</label><br>
			<input type="checkbox" class="custom-control-input" id="customCheck" name="services[ ]" value="Solar electricity">
			<label class="custom-control-label" for="customCheck" name = "solar">Solar electricity</label><br>

		<!-- <Select name="seater" class="form-control" required>
			<option value="">Select </option>
			<option value="1">Self contained and single rooms </option>
			<option value="2">Self contained and double rooms</option>

		</Select> -->
	</div>
	</div>
	<div class="form-group">
<label class="col-sm-2 control-label">For more information contact me at</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="cont" id="fee" value="" required="required" placeholder = "07********">
</div>
</div>

<!-- <div class="form-group">
 <label class="col-sm-2 control-label">Fee per semester)</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="fee" id="fee" value="" required="required">
</div>
</div> -->

<div class="col-sm-8 col-sm-offset-2">
<input class="btn btn-primary" type="submit" name="submit" value="Submit">
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