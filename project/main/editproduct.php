<?php
	include('../workConnect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM product_details WHERE prodId= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Product Name : </span><input type="text" style="width:265px; height:30px;"  name="name" value="<?php echo $row['prodName']; ?>" Required/><br>
<span>Product Qty : </span><input type="text" style="width:265px; height:30px;"  name="qty" value="<?php echo $row['prodQty']; ?>" /><br>
<span>Unit Price : </span><input type="text" style="width:265px; height:30px;"  name="price" value="<?php echo $row['unitPrice']; ?>" /><br>




<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>