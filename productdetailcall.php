<?php 
$con = mysqli_connect("localhost", "admin", null, "pganim");

$id = $_GET['id'];

$query = "SELECT * FROM products where product_id = '$id'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<p>No products found.</p>";
} else {
    echo "<p align=center>Products:</p>";
    echo "<table border=1 align=center>";
    echo "<tr bgcolor=yellow><th><b>ID</b></th><th><b>Name</b></th><th><b>Category</b></th><th><b>Image</b></th><th><b>Price</b></th><th><b>Description</b></th><th><b>Status</b></th>";
    while ($row = mysqli_fetch_array($result)) {
        //echo "<a href ='productdetailcall.php?id=".$row['product_id']."'>";

        echo "<tr><th>" . $row['product_id'] . "</th><th>" . $row['product_name'] . "</th><th>" . $row['category'] . "</th><th><a href ='productdetailcall.php?id=".$row['product_id']."'><img src='images/".$row['img']."' width='100' height='100'></a></th><th>" . $row['price'] . "</th><th>" . $row['description'] . "</th><th>" . $row['stock_status'] ."</th></tr>";
    
        //echo "</a>";
    }
    echo "</table><br>";
}


mysqli_close($con);


?>