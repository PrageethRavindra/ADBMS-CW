<!DOCTYPE html>
<html>
<head>
	<!-- js -->			
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<title>
POS
</title>
<?php
	require_once('auth.php');
?>
       
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

	
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->




 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	

</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
	
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<!-- <li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li> -->
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<li><a href="reviews.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reviews</a></li>

			<br><br><br><br><br><br>
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="text" class="trans" name="face" value="" disabled>
			</form>
			  </div>
			</li>
				
				</ul>    
<?php } ?>				
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
		<div class="contentheader">
			<i class="icon-money"></i> Sales
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////													 -->
<form action="createOrder.php" method="post" onsubmit="setSelectedCusId()">
    Select the customer for the sale <br> <br>
    <select name="customer" style="width:650px;" class="chzn-select" required>
        <?php
        include('../workConnect.php');
        $result = $db->prepare("SELECT * FROM customer_details");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
        ?>
            <option value="<?php echo $row['cusId']; ?>"><?php echo $row['cusId']; ?> - <?php echo $row['cusName']; ?> - <?php echo $row['cusTeleNo']; ?> - <?php echo $row['cusEmail']; ?> </option>
        <?php
        }
        ?>
    </select>

    <!-- Add a hidden input field to store the selected cusId -->
    <input type="hidden" name="selectedCusId" id="selectedCusId" value="">


	<?php
		include('../workConnect.php');
		
		// SELECT orderId FROM order_details order by desc
        $result = $db->prepare("SELECT orderId FROM order_details ORDER BY orderId DESC LIMIT 1;");
        $result->execute();
		$orderId = $result->fetchColumn();

        //for ($i = 0; $row = $result->fetch(); $i++) {
	


			
	?>
      


	<input type="number" name="orderId" value="<?php echo $orderId; ?>" placeholder="Order ID" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;"  >

<button type="submit" id="submitButton" class="btn btn-info" style="width: 173px; height:35px; margin-top:-5px;" <?php echo !empty($orderId) ? 'disabled' : ''; ?>>
    <i class="icon-plus-sign icon-large"></i> Make Order
</button>

<script>
    // JavaScript function to disable/enable the button based on orderId value
    function toggleButton() {
        var orderIdField = document.getElementsByName("orderId")[0];
        var submitButton = document.getElementById("submitButton");

        // Disable the button if orderId has a value, enable it otherwise
        submitButton.disabled = orderIdField.value !== "";
    }

    // Call the function whenever the orderId field changes
    document.getElementsByName("orderId")[0].addEventListener("input", toggleButton);

    // Call the function on page load to set the initial state
    toggleButton();
</script>









</form>

<script>
    // JavaScript function to set the selected cusId in the hidden input field
    function setSelectedCusId() {
        var selectedCustomer = document.getElementsByName("customer")[0];
        var selectedCusId = selectedCustomer.value;
        document.getElementById("selectedCusId").value = selectedCusId;
    }
</script>



<form action="incoming.php" method="post" >
<input type="hidden" name="orderId" value="<?php echo $orderId; ?>">


Add Products for the sale <br><br>
<select name="product" style="width:650px; "class="chzn-select" required>
<?php
	include('../workConnect.php');
	$result = $db->prepare("SELECT * FROM product_details");
		//$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option name="prodId" value="<?php echo $row['prodId'];?>"><?php echo $row['prodName']; ?> - <?php echo $row['unitPrice']; ?> - <?php echo $row['prodQty']; ?> </option>
	<?php
				}
			?>
</select>
<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<!-- <input type="hidden" name="pd" value="<?php echo $row['prodId'];?>> -->



<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
</form>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Order Id </th>
			
			<th> Item Id </th>
			<!-- <th> Product Qty </th> -->
			<th> Quantity </th>

		</tr>
	</thead>
	<tbody>
		
			<?php
				// $id=$_GET['invoice'];
				include('../workConnect.php');
				$result = $db->prepare("SELECT * FROM order_item WHERE orderId = :userid");
				$result->bindParam(':userid', $orderId);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td ><?php echo $row['orderId']; ?></td>
			<td><?php echo $row['prodId']; ?></td>
			<td><?php echo $row['itemQty']; ?></td>

			
			
			
			<?php
				}
			?>
			
		
	</tbody>



</table><br>


<a rel="facebox" href="checkout.php?orderId=<?php echo urlencode($orderId); ?>">
    <button class="btn btn-success btn-large btn-block">
        <i class="icon icon-save icon-large"></i> SAVE
    </button>
</a>


<div class="clearfix"></div>
</div>
</div>
</div>
</body>
<?php include('footer.php');?>
</html>