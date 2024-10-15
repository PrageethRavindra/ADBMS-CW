<?php
session_start();
error_reporting(0);
include('include/connect.php');
$dispensary_Id = $_SESSION['id'];

// if(strlen($_SESSION['id']==0)) {
//  header('location:logout.php');
//   }
//    else{

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | View Dispensaries</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/dispensary-sidebar.php');?>

<?php 
	$disId =  $_SESSION['id'];
    // $ret=mysqli_query($con,"SELECT * FROM tbl_dispensary WHERE dispensary_id='$disId' ");
    $ret=mysqli_query($con,"	select tbl_userlogins.* , tbl_dispensary.* from tbl_userlogins
	INNER JOIN tbl_dispensary
	on tbl_userlogins.user_id = tbl_dispensary.user_id
	WHERE tbl_dispensary.user_id ='$disId' ");



    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
    $disName = $num['dispensary_name'];
    $status=1;
	echo $disName;
    }
?>

<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle"><?php echo $disName?> | View All Details</h1>
</div>
<ol class="breadcrumb">
<li>
<span><?php echo $disName?></span>
</li>
<li class="active">
<span>View Dispensary</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">View <span class="text-bold">Registered Dispensary</span></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Dispensary Name</th>
<th>Dispensary Contact</th>
<th>Dispensary location </th>
<th>Dispensary incharge </th>
<th>Dispensary Status </th>
<th>View </th>
</tr>
</thead>
<tbody>
<?php

// $sql=mysqli_query($con,"select tbl_dispensary.dispensary_id, tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_reg, tbl_dispensary.dispensary_app, tbl_dispensary.dispensary_incharge, tbl_userlogins.user_status, tbl_dispensary.status
// from tbl_dispensary INNER JOIN tbl_userlogins
// on tbl_dispensary.user_id = tbl_userlogins.user_id");


$sql=mysqli_query($con,"select tbl_dipensary.* , tbl_userlogins.* from tbl_dispensary inner join tbl_userlogins on tbl_dispensary.user_id = tbl_userlogins.user_id");
// SELECT tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_location, tbl_dispensary.dispensary_incharge, tbl_userlogins.user_status,tbl_dispensary.dispensary_idFROM tbl_dispensary INNER JOIN tbl_userlogins on tbl_dispensary.user_id = tbl_userlogins.user_id


//$sqltp=mysqli_query($con,"SELECT tbl_dispensary.dispensary_id, tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_location, tbl_dispensary.dispensary_incharge, tbl_dispensary_contact.dispensary_contact,tbl_dispensary.status FROM ((tbl_dispensary INNER JOIN tbl_userlogins on tbl_dispensary.user_id = tbl_userlogins.user_id)INNER JOIN tbl_dispensary_contact on tbl_dispensary.dispensary_id = tbl_dispensary_contact.dispensary_id)where tbl_dispensary.status = 'approved' or tbl_dispensary.status = 'Approved'");

// $sqltp=mysqli_query($con,"SELECT * FROM tbl_dispensary where status = 'approved' or status = 'Approved'");
$sqltp=mysqli_query($con,"SELECT * FROM tbl_dispensary where user_id = '$dispensary_Id'");




$cnt=1;
while($row=mysqli_fetch_array($sqltp))
{
	?>
	<tr>
	<td class="center"><?php echo $cnt;?>.</td>
	<td class="hidden-xs"><?php echo $row['dispensary_name'];?></td>
	<td><?php echo $row['dispensary_tp'];?></td>
	<td><?php echo $row['dispensary_location'];?></td>
	<td><?php echo $row['dispensary_incharge'];?></td>
	<td><?php echo $row['status'];?>
	</td>
	<td>

	<a href="view-dispensary_details.php?viewid=<?php echo $row['dispensary_id'];?>"><i class="fa fa-eye"></i></a>

	</td>
	</tr>
	<?php 
	$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php 
// }
 ?>
