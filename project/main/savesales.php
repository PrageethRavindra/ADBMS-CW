<?php
session_start();
include('../workConnect.php');
$a = $_POST['orderId'];
$b = $_POST['orderDate'];
$c = $_POST['paymentType'];
$d = $_POST['paidStatus'];
$e = $_POST['totalAmount'];





$sql = "INSERT INTO order_payment(orderId,paymentDate, paymentMethod, status) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));


// $sql2 = "INSERT INTO order_details(totalAmount where orderId = ?) VALUES (:a, :id)";
// $q = $db->prepare($sql2);
// $q->execute(array(':a'=>$e, ':id' =>$a));

$sql1 = "UPDATE order_details
        SET totalAmount=?
		WHERE orderId=?";
$q = $db->prepare($sql1);
$q->execute(array($e,$a));
header("location: index.php");

// query



?>