<!DOCTYPE html>
<html>

<?php
include 'header.php';
include 'sidebar.php';
include 'includes/session.php';

$con = mysqli_connect("localhost", "admin", null, "pganim");
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Orders
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Orders</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <br>
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Order ID:</th>
                                            <th>Customer Name:</th>
                                            <th>Product Name:</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Order Status</th>
                                            <th>Tools</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query = "SELECT * FROM orders";
                                            $result = mysqli_query($con, $query);



                                            if (mysqli_num_rows($result) == 0) {
                                                echo "<p>No orders found.</p>";
                                            } else {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $customerName2ID = $row['customer_id'];
                                                    $query2 = "SELECT first_name FROM customers WHERE customer_id = $customerName2ID";
                                                    $result2 = mysqli_query($con, $query2);

                                                    $productID2Name = $row['product_id'];
                                                    $query3 = "SELECT product_name FROM products WHERE product_id = $productID2Name";
                                                    $result3 = mysqli_query($con, $query3);

                                                    foreach ($result2 as $customer) {
                                                    foreach ($result3 as $product) {
                                                            echo "
                            <tr>
                            <td style='width:120px'>" . $row['order_id'] . "</td>
                            <td style='width:150px'>" . $customer['first_name'] . "</td>
                            <td style='width:150px'>" . $product['product_name'] . "</td>
                            <td style='width:120px'>RM " . number_format($row['price'], 2) . "</td>
                            <td style='width:120px'>" . $row['quantity'] . "</td>
                            <td style='width:120px'>" . $row['order_status'] . "</td>
                            <td style='width:150px'>
                            <a href ='orders_edit.php?id=" . $row['order_id'] . "&custid=".$row['customer_id']."&prodid=".$row['product_id']."'><button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['order_id'] . "'><i class='fa fa-edit'></i> Edit</button></a>
                            </td>
                           </tr>
                            ";
                                                        }
                                                    }
                                               }
                                           }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </section>
        </div>
    </div>

</body>

</html>