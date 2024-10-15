<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>
<body onLoad="document.getElementById('country').focus();">




<form action="savesales.php" method="post">
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> Cash</h4></center><hr>
<!-- <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" /> -->
<center>

<?php
if (isset($_GET['orderId'])) {
    // Get the value of 'pt' parameter
    $orderId = urldecode($_GET['orderId']);

    // Now, you can use $orderId in your code
    // echo "Received orderId: " . $orderId;
} else {
    // echo "orderId not received.";
}



?>
<input type="text" size="25" value="<?php echo $orderId ?>" name="orderId" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" readonly />
<br><br>
<input type="text" size="25" value="<?php echo date('Y-m-d'); ?>" name="orderDate" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" readonly />
<!-- <input type="text" size="25" value="<?php echo $orderId ?>" name="orderId" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" /> -->
<br><br>
<select name="paymentType" style="width:300px;" class="chzn-select" required>
    <option value=""></option>
    <option value="cash">Cash</option>
    <option value="card">Card</option>
</select>


<br><br>


<input type="checkbox" name="paidStatus" value="paid" style="width: 20px; height: 20px; margin-right: 5px;" required> Payment Status

<br><br>

<?php
	include('../workConnect.php');
	$result = $db->prepare("SELECT sum(order_item.itemQty * product_details.unitPrice) from 
							order_item INNER JOIN product_details
							on order_item.prodId = product_details.prodId
							where order_item.orderId = $orderId;");
		//$result->bindParam(':userid', $res);
		$result->execute();
		$totalAmount = $result->fetchColumn();

		
	?>

<label for="">Total Amount</label>
<input type="text" size="25" value="<?php echo $totalAmount ?>" name="totalAmount" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px; height:30px;" readonly />

<br>
<br>

   
<?php
// $asas=$_GET['pt'];


?>

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</center>
</div>
</form>
</body>
</html>