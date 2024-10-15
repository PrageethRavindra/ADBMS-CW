<?php
// configuration
include('../workConnect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['email'];
// query
$sql = "UPDATE customer_details
        SET cusName=?, cusAddress=?, cusTeleNo=?, cusEmail=?
		WHERE cusId=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$id));
header("location: customer.php");

?>