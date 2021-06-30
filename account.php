<!DOCTYPE html>
<html>

<?php
include 'includes/session.php';
//Get header
include 'header.php';
?>


<body>

    
    <?php

    $con = $con = mysqli_connect("localhost", "admin", null, "pganim");

    $custid = $_SESSION['cust_id'];
    $queryCust = "SELECT * FROM customers WHERE customer_id = $custid";
    $resultCust = mysqli_query($con, $queryCust);

    $queryOrder = "SELECT * FROM ordedrs WHERE customer_id = $custid";
    $resultOrder = mysqli_query($con, $queryOrder);

    ?>

    <!-- page wrapper class -->
    <div class="page-wrapper quicksand-font">

        <!-- START BELOW HERE -->
        <br>
        <br>
        <div class="container">
            <div class="row">

                <p><a style="color: inherit; text-decoration:none;" href="logout.php">Logout</a></p>

            </div>

            <div class="row">

                <h3>My Account</h3>

            </div>

            <br>
            <div class="row">

                <p>Welcome back, <?php echo $_SESSION['full_name'] ?></p>

            </div>
            <br><br>
            <div class="row">

                <div class="col-8">

                    <h5>My Orders</h5>
                    <hr>
                    <div class="row">
                        
                            <?php

                            $query = "SELECT * FROM orders WHERE customer_id = $custid";
                            $result = mysqli_query($con, $query);



                            if (mysqli_num_rows($result) == 0) {
                                echo "<p>No orders found.</p>";
                            } else {
                            ?>
                        <table class="table table-bordered">
                            <thead>
                                <th>Order ID:</th>
                                <th>Product Name:</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Order Status</th>
                            </thead>
                            <tbody>
                            <?php

                                while ($row = mysqli_fetch_array($result)) {

                                    $productID2Name = $row['product_id'];
                                    $query3 = "SELECT product_name FROM products WHERE product_id = $productID2Name";
                                    $result3 = mysqli_query($con, $query3);

                                    foreach ($result3 as $product) {
                                        echo "
                            <tr>
                            <td style='width:120px'>" . $row['order_id'] . "</td>
                            <td style='width:150px'>" . $product['product_name'] . "</td>
                            <td style='width:120px'>RM " . number_format($row['price'], 2) . "</td>
                            <td style='width:120px'>" . $row['quantity'] . "</td>
                            <td style='width:120px'>" . $row['order_status'] . "</td>
                           </tr>
                            ";
                                    }
                                }
                            }


                            ?>
                            </tbody>
                        </table>
                        
                    </div>

                </div>
                <div class="col-1">
                </div>
                <div class="col-3">

                    <h5>Profile Details</h5>
                    <hr>

                    <?php
                    if (mysqli_num_rows($resultCust) == 0) {
                        echo "<p>No Details Found.</p>";
                    } else {
                        while ($row = mysqli_fetch_array($resultCust)) {


                            echo "<div class='row'>";
                            echo "<p>" . $row['first_name']." ".$row['last_name']. "</p>";
                            echo "</div>";

                            echo "<div class='row'>";
                            echo "<p>" . $row['email'] . "</p>";
                            echo "</div>";

                            echo "<div class='row'>";
                            echo "<p>" . $row['mobile_number'] . "</p>";
                            echo "</div>";

                            echo "<div class='row'>";
                            echo "<p>" . $row['address'] . "</p>";
                            echo "</div>";

                            echo "<div class='row'>";
                            echo "<p><a href='accountdetails.php'><button type='button' class='btn btn-secondary'>Edit Profile Details</button></a></p>";
                            echo "</div>";
                        }
                    }
                    ?>

                </div>

            </div>

        </div>



        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>