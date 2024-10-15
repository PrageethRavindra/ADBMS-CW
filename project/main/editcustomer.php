<?php
	include('../workConnect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer_details WHERE cusId= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" placeholder="Address"/><br>
<span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact"/><br>
<span>Email : </span><input type="email" style="width:265px; height:30px;" name="email" placeholder="Email"/><br><div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>