<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
	<title>Hostel Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:2%">Hostel Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All hostels Details</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>
<?php	
$aid=$_SESSION['login'];
	$ret="select * from about_hostel";
	$result = $mysqli->query($ret) or die(mysqli_error($mysqli));

	  	?>

<tr>
<td colspan="4"><h4>Hostel Information</h4></td>
<!-- <td><a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/hostel/full-profile.php?id=<?php echo $row->emailid;?>');" title="View Full Details">Print Data</a></td> -->
</tr>

<?php
while($hostel=mysqli_fetch_array($result))
{
  
$html= "<tr>";
$html.= "<td><b>Hostel name:</b></td>";
$html.="<td>".$hostel['hname']."</td>";
$html.="</tr>";
$html.="<tr>";
$html.="<td><b>location:</b></td>";
$html.="<td>".$hostel['location']."</td>";
$html.="</tr>";
$html.="<tr>";
$html.="<td><b>Contact :</b></td>";
$html.="<td>".$hostel['cont']."</td>";
$html.="</tr>";
$html.="<tr>";
$html.="<td><b>Nature of rooms :</b></td>";
$html.="<td>".$hostel['nature_of_room']."</td>";
$html.="</tr>";
$html.="<tr>";
$html.="<td><b>Services:</b></td>";
$html.="<td>".$hostel['services_available']."</td>";
$html.="</tr>";
$html.="<tr>";
$html.="<td><b>Book hostel:</b></td>";
$html.="<td><a href='book-hostel.php'><button class='btn btn-primary'>Book hostel</button></a></td>";
$html.="</tr>";
$html.="<tr>";

$html.="</tr>";


echo $html;
}
?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	<!-- Loading Scripts -->
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
