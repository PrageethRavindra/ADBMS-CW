<?php
	include('../workConnect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM customer_details WHERE cusId= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>