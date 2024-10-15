<?php
session_start();
include('../workConnect.php');
// $b = $_POST['prodName'];
// $w = $_POST['unitPrice'];


// $cusId = $_POST['cusId'];
$orderId = $_POST['orderId'];
$prodId = $_POST['product'];
$qty = $_POST['qty'];




$myDate = date('m/d/Y');



$sql = "INSERT INTO order_item (orderId,prodId,itemQty) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$orderId,':b'=>$prodId,':c'=>$qty));
// header("location: sales.php?id=$w&invoice=$a");
header("location: sales.php");


?>

