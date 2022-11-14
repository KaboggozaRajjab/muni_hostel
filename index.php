<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
// $username=$_POST['username'];

// code choose users roles and redirects them to their respective dashboards
$role=$_POST['role'];
 if ($role=='Student'){
		$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
					$stmt->bind_param('ss',$email,$password);
					$stmt->execute();
					$stmt -> bind_result($email,$password,$id);
					$rs=$stmt->fetch();
					$stmt->close();
					$_SESSION['id']=$id;
					$_SESSION['login']=$email;
					$uip=$_SERVER['REMOTE_ADDR'];
					$ldate=date('d/m/Y h:i:s', time());
					if($rs)
					{
				$uid=$_SESSION['id'];
				$uemail=$_SESSION['login'];
	$ip=$_SERVER['REMOTE_ADDR'];
	$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
	$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
	$city = $addrDetailsArr['geoplugin_city'];
	$country = $addrDetailsArr['geoplugin_countryName'];
	$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
	$mysqli->query($log);
	if($log)
	{
	header("location:dashboard.php");
					}
	}
	else
	{
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
 }
 //landlord connection
 elseif ($role=='LandLord') {

	$statement="SELECT id,username,email,password FROM landlord WHERE email='$email' and password='$password'";
	$query=mysqli_query($mysqli,$statement);
	if ($query){
		$row=mysqli_fetch_array($query);
		// $_SESSION['id']=$row['id'];
		$_SESSION['id']=$id;
		// $id=$row['id'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$ldate=date('d/m/Y h:i:s', time());
		$insert="INSERT into admin(id,email,password,updation_date)VALUES('$id','$email','$password','$uip')";
		$query2=mysqli_query($mysqli,$insert);
		header("location:manager/admin-profile.php");
	}

	else
	{
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
 }
elseif ($role=='Adminstrator'){
	// $stmt="SELECT id,username,email,password FROM  WHERE email='$email' and password='$password'";
	// $query=mysqli_query($mysqli,$stmt);
	$statement="SELECT username,email,password,id FROM adminstrator WHERE email='$email' and password='$password'";
	// $statement="SELECT id,username,email,password FROM landlord WHERE email='$email' and password='$password'";
	$query=mysqli_query($mysqli,$statement);
	if ($query){
		$row=mysqli_fetch_array($query);
		// $_SESSION['id']=$row['id'];
		$_SESSION['id']=$id;
		// $id=$row['id'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$ldate=date('d/m/Y h:i:s', time());
		$insert="INSERT into admin(id,email,password,updation_date)VALUES('$id','$email','$password','$uip')";
		$query2=mysqli_query($mysqli,$insert);
		 header("location:admin/index.php");
	}

	else
	{
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
}

//role of the admin
elseif ($role=='Dean of Students') {

	$statement="SELECT id,username,email,password FROM dean WHERE email='$email' and password='$password'";
	$query=mysqli_query($mysqli,$statement);
	if ($query){
		$row=mysqli_fetch_array($query);
		// $_SESSION['id']=$row['id'];
		$_SESSION['id']=$id;
		// $id=$row['id'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$ldate=date('d/m/Y h:i:s', time());
		$insert="INSERT into admin(id,email,password,updation_date)VALUES('$id','$email','$password','$uip')";
		$query2=mysqli_query($mysqli,$insert);
		header("location:dean/dean-profile.php");
	}

	else
	{
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
 }
	
	

	// $stmt=$mysqli->prepare("SELECT id,username,email,password FROM landlord WHERE (username=?|| email=?) and password=? ");
// 	$stmt->bind_param('sss',$username,$email,$password);
// 	$stmt->execute();
// 	$stmt -> bind_result($username,$email,$password,$id);
// 	$rs=$stmt->fetch();
// 	$_SESSION['id']=$id;
// 	$uip=$_SERVER['REMOTE_ADDR'];
// 	$ldate=date('d/m/Y h:i:s', time());
// 	if($rs)
// 	{
//                 //  $insert="INSERT into admin(adminid,ip)VALUES(?,?)";
//    // $stmtins = $mysqli->prepare($insert);
//    // $stmtins->bind_param('sH',$id,$uip);
//     //$res=$stmtins->execute();
// 					header("location:admin-profile.php");
// 				}

// 				else
// 				{
// 					echo "<script>alert('Invalid Username/Email or password');</script>";
// 				}
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
	<title>Student Hostel Registration</title>
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
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div>
					
						

						<div class="row">
					<div>
						<div class="well row pt-2x pb-3x bk-light">
						<h2 style="margin-left:5em;" class="text-bold text-dark mt-4x">Login </h2>
						<div class="shadow col-md-6">
						<div style="margin-top:4%, border:1px solid black; color:black; height:1em;" class='bg-primary'></div>
								<form action="" class="" method="post">
									
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<label>Login As</label>
									<select name='role'>
									<option value="default">Choose role</option>
									<option value="Adminstrator">Adminstrator</option>
									<option value="Dean of Students">Dean of Students</option>
									<option value="LandLord">LandLord</option>
									<option value="Student">Student</option>
									</select>

									<input style="width:100%; height:2em; color:black;" type="submit" name="login" value="login" >
								</form>
								<div class="text-center text-light" style="color:black;">
							<a href="forgot-password.php" style="color:black;">Forgot password?</a>
							</div>
							<div style="border:1px solid black; color:black; height:2em;" class='mt-2 bg-primary'></div>
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
</body>

</html>