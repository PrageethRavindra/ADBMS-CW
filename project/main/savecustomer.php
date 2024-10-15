<?php
session_start();
include('../workConnect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['email'];

// query
// $sql = "INSERT INTO ci.customer_details (cusName,cusAddress,cusTeleNo,cusEmail) VALUES (:a,:b,:c,:d)";
// $q = $db->prepare($sql);
// $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));

$sql = "CALL InsertCustomerDetails(:cusName, :cusAddress, :cusTeleNo, :cusEmail)";
$q = $db->prepare($sql);

// Bind parameters
$q->bindParam(':cusName', $a);
$q->bindParam(':cusAddress', $b);
$q->bindParam(':cusTeleNo', $c);
$q->bindParam(':cusEmail', $d);

// Execute the stored procedure
$q->execute();


header("location: customer.php");


?>



<!-- used procedure to add the customers to the database -->