<?php
session_start();
include('../workConnect.php');

$cusId = $_POST['selectedCusId'];
$myDate = date('m/d/Y');
$nullTot = 0;


$sql = "INSERT INTO order_details (orderDate,totalAmount,cusId) VALUES (CURDATE(),:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':b'=>$nullTot,':c'=>$cusId));
// header("location: sales.php?id=$w&invoice=$a");
header("location: sales.php");


?>

