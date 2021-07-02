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

    <?php

    $paymentid = $_GET['pay'];


    ?>

    <!-- page wrapper class -->
    <div class="page-wrapper quicksand-font">

        <!-- START BELOW HERE -->


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

    <!-- thank you modal -->
    <div class="modal" id="tqpopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/thank-you.png" alt="thank you" width="465" height="465">
                </div>
            </div>
        </div>
    </div>


    <script>
        var tqpopup = new bootstrap.Modal(document.getElementById('tqpopup'), {})
        tqpopup.toggle()

    </script>

</body>

</html>