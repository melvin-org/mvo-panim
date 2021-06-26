<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

if (isset($_POST['add'])) {
    $collectionname = $_POST['collectionname'];
    $collectiondesc = $_POST['collectiondesc'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $createdAt =  date('Y-m-d H:i:s');
    $updatedAt =  date('Y-m-d H:i:s');

    $queryCount = "select max(collection_id) from collections";
    $resultCount = mysqli_query($con, $queryCount);
    while ($row = mysqli_fetch_array($resultCount)) {
        $cid = $row["max(collection_id)"] + 1;
    }

    $queryAdd = "INSERT INTO collections values ('$cid', '$collectionname', '$collectiondesc', '$createdAt','$updatedAt')";
    $resultAdd = mysqli_query($con, $queryAdd);

    if ($resultAdd > 0) {
        echo "<script>alert('Collection Successfully Added')</script>";
       

    } else echo "<script>alert('Collection Failed to be Added')</script>";

    mysqli_close($con);
}

header('location: collections.php');

?>