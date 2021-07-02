<!DOCTYPE html>
<html>
<?php
session_start();
include 'header.php';
?>


<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <!--Get header -->

    <!-- page wrapper class -->
    <div class="page-wrapper quicksand-font">

        <!-- START BELOW HERE -->

        <div class="d-flex justify-content-center">
            <div class="row">
                <img src="images/thank-you.png" alt="thank you" width="500" height="500">
            </div>

        </div>
            <div class="d-flex justify-content-center pt-5">
                <a href="product_list.php"><button class="btn btn-warning">Continue Shopping</button></a>
                <span class="p-2">Or</span>
                <a href="order_list.php"><button class="btn btn-warning">View Orders</button></a>
            </div>








        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>