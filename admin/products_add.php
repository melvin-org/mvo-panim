<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

if (isset($_POST['add'])) {
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pcollection = $_POST['pcollection'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdesc'];
    $pstock = $_POST['pstock'];
    $filename = $_FILES['photo']['name'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $createdAt =  date('Y-m-d H:i:s');
    $updatedAt =  date('Y-m-d H:i:s');

    $queryCount = "select count(product_id) from products";
    $resultCount = mysqli_query($con, $queryCount);
    while ($row = mysqli_fetch_array($resultCount)) {
        $pid = $row["count(product_id)"] + 1;
    }

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $pname . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $new_filename);
    } else {
        $new_filename = '';
    }

    $queryAdd = "INSERT INTO products values ('$pid', '$pname', '$pcat', '$pcollection','$new_filename','$pprice', '$pdesc', '$pstock', '$createdAt','$updatedAt')";
    $resultAdd = mysqli_query($con, $queryAdd);

    if ($result > 0) {
        echo "<script>alert('Product Successfully Added')</script>";
       

    } else echo "<script>alert('Product Successfully Added')</script>";

    mysqli_close($con);
}

header('location: products.php');

?>