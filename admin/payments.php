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
                    Payments
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Payments</li>
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
                                            <th>Payment ID</th>
                                            <th>Order ID</th>
                                            <th>Payment Date & Time</th>
                                            <th>Amount</th>
                                            <th>Reference Number</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query = "SELECT * FROM payments";
                                            $result = mysqli_query($con, $query);



                                            if (mysqli_num_rows($result) == 0) {
                                                echo "<p>No Payments Found.</p>";
                                            } else {
                                                while ($row = mysqli_fetch_array($result)) {
                                                
                                                            echo "
                            <tr>
                            <td style='width:120px'>" . $row['payment_id'] . "</td>
                            <td style='width:150px'>" . $row['order_id'] . "</td>
                            <td style='width:150px'>" . $row['payment_dateTime'] . "</td>
                            <td style='width:150px'>" . $row['amount'] . "</td>
                            <td style='width:120px'>" . $row['ref_no'] . "</td>
                           </tr>
                            ";
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