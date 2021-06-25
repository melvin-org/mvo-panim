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
                    Customers
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Customers</li>
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
                                            <th>Customer ID</th>
                                            <th>Customer First Name</th>
                                            <th>Customer Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Tools</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query = "SELECT * FROM customers";
                                            $result = mysqli_query($con, $query);



                                            if (mysqli_num_rows($result) == 0) {
                                                echo "<p>No Customers Found.</p>";
                                            } else {
                                                while ($row = mysqli_fetch_array($result)) {
                                                
                                                            echo "
                            <tr>
                            <td style='width:120px'>" . $row['customer_id'] . "</td>
                            <td style='width:150px'>" . $row['first_name'] . "</td>
                            <td style='width:150px'>" . $row['last_name'] . "</td>
                            <td style='width:150px'>" . $row['email'] . "</td>
                            <td style='width:120px'>" . $row['mobile_number'] . "</td>
                            <td style='width:120px'>" . $row['address'] . "</td>
                            <td style='width:150px'>
                            <a href ='customers_edit.php?id=" . $row['customer_id'] . "'><button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['customer_id'] . "'><i class='fa fa-edit'></i> Edit</button></a>
                            </td>
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