<?php
	include('../workConnect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM product_details WHERE prodId= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>