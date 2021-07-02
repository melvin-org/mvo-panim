<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

$deleteid = $_GET['pid'];
$queryDelete = "DELETE FROM cart WHERE product_id = '$deleteid'";
$resultDelete = mysqli_query($con, $queryDelete);


mysqli_close($con);


// echo "<script language='javascript'>window.alert('Product Deleted.');window.location='';</script>";
header('location: cart.php');

?>