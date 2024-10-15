<?php
session_start();
include('../workConnect.php');
$a = $_POST['name'];
$b = $_POST['qty'];
$c = $_POST['price'];

// query
// $sql = "INSERT INTO product_details (prodName,prodQty,unitPrice) VALUES (:a,:b,:c)";
// $q = $db->prepare($sql);
// $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));

$sql = "CALL InsertProductDetails(:prodName, :prodQty, :unitPrice)";
$q = $db->prepare($sql);

$q->bindParam(':prodName', $a);
$q->bindParam(':prodQty', $b);
$q->bindParam(':unitPrice', $c);

$q->execute();


header("location: products.php");


?>

<!-- used procedure insertproducts   -->