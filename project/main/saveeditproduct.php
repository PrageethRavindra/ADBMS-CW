<?php
// configuration
include('../workConnect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$z = $_POST['qty'];
$b = $_POST['price'];

// query
$sql = "UPDATE product_details
        SET prodName=?, prodQty=?, unitPrice=?
        		WHERE prodId=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$id));
header("location: products.php");

?>