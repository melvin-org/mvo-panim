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
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">

                                <p>Total Orders</p>

                                <?php
                                $queryOrders = "select count(order_id) from orders";
                                $resultOrders = mysqli_query($con, $queryOrders);
                                while ($ordersRow = mysqli_fetch_array($resultOrders)) {
                                    $ordersCount = $ordersRow["count(order_id)"];
                                }

                                echo "<h3>".$ordersCount."</h3>";
                                ?>

                            </div>
                            <div class="icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <a href="orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">

                                <p>Number of Products</p>

                                <?php
                                $queryProduct = "select count(product_id) from products";
                                $resultProduct = mysqli_query($con, $queryProduct);
                                while ($productRow = mysqli_fetch_array($resultProduct)) {
                                    $productCount = $productRow["count(product_id)"];
                                }

                                echo "<h3>".$productCount."</h3>";
                                ?>
                            </div>
                            <div class="icon">
                                <i class="fa fa-barcode"></i>
                            </div>
                            <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">

                                <p>Number of Customers</p>

                                <?php
                                $queryCust = "select count(customer_id) from customers";
                                $resultCust = mysqli_query($con, $queryCust);
                                while ($custRow = mysqli_fetch_array($resultCust)) {
                                    $custCount = $custRow["count(customer_id)"];
                                }

                                echo "<h3>".$custCount."</h3>";
                                ?>

                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="customers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->


            </section>
        </div>
    </div>
    <?php
    mysqli_close($con);
    ?>
</body>

</html>