<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

if (isset($_POST['add'])) {
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pcollection = $_POST['pcollection'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdesc'];
    $pstatus = $_POST['pstatus'];
    $filename = $_FILES['photo']['name'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $createdAt =  date('Y-m-d H:i:s');
    $updatedAt =  date('Y-m-d H:i:s');

    $query1 = "select count(product_id) from products";
    $result = mysqli_query($con, $query1);
    while ($row = mysqli_fetch_array($result)) {
        $pid = $row["count(product_id)"] + 1;
    }

    if (!empty($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $new_filename = $pname . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $new_filename);
    } else {
        $new_filename = '';
    }

    $query = "INSERT INTO products values ('$pid', '$pname', '$pcat', '$pcollection','$new_filename','$pprice', '$pdesc', '$pstatus', '$createdAt','$updatedAt')";
    $result = mysqli_query($con, $query);

    if ($result > 0) {
        echo "<p style='font-family:calibri;text-align:center;'><center>product successfully added.</center></p>";

    } else echo "Error";

    mysqli_close($con);
}
