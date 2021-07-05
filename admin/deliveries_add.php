<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

if (isset($_POST['add'])) {
    $orderid = $_POST['order_id'];
    $courierused = $_POST['courier_used'];
    $deliveryfee = $_POST['delivery_fee'];
    $trackingno = $_POST['tracking_no'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $createdAt =  date('Y-m-d H:i:s');
    $updatedAt =  date('Y-m-d H:i:s');

    $queryCount = "select max(delivery_id) from delivery";
    $resultCount = mysqli_query($con, $queryCount);
    while ($row = mysqli_fetch_array($resultCount)) {
        $did = $row["max(delivery_id)"] + 1;
    }

    $queryAdd = "INSERT INTO delivery values ('$did', '$orderid', '$courierused', '$deliveryfee','$trackingno','$createdAt','$updatedAt')";
    $resultAdd = mysqli_query($con, $queryAdd);

    if ($resultAdd > 0) {
        echo "<script>alert('Collection Successfully Added')</script>";
       

    } else echo "<script>alert('Collection Failed to be Added')</script>";

    mysqli_close($con);
}

header('location: deliveries.php');

?>