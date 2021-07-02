<!DOCTYPE html>
<html>

<?php
include 'includes/session.php';
//Get header
include 'header.php';
include 'includes/addressedit_modal.php';
?>


<body>


    <?php

    $con = $con = mysqli_connect("localhost", "admin", null, "pganim");
    $custid = $_SESSION['cust_id'];
    $subtotal = 0;

    $getCustomerOrderCart = "SELECT * FROM cart WHERE customer_id = $custid";
    $customerCartResult = mysqli_query($con, $getCustomerOrderCart);

    $customerDetailQuery = "SELECT * FROM customers WHERE customer_id = $custid";
    $customerDetailResult = mysqli_query($con, $customerDetailQuery);
    $customerDetail = mysqli_fetch_array($customerDetailResult);

    if(strpos(strtolower($customerDetail["address"]), 'sabah') !== false || strpos(strtolower($customerDetail["address"]), 'Sarawak') !== false ){
        $deliveryFee = 10;
    } else{
        $deliveryFee = 7;
    }

    $total = $deliveryFee;

    // $queryOrder = "SELECT * FROM ordedrs WHERE customer_id = $custid";
    // $resultOrder = mysqli_query($con, $queryOrder);

    ?>

    <!-- page wrapper class -->
    <div class="page-wrapper quicksand-font">

        <!-- START BELOW HERE -->
        <div class="container">
            <div class="row">

                <div class="col-8 h-100">
                    <span><b>Delivery Details</b></span>
                    <div class="row pt-2 pb-2">
                        <div class="col-3">
                            <span>
                                Delivery Address:
                            </span>
                        </div>
                        <div class="col-1">
                            <span>:</span>
                        </div>
                        <div class="col-8">
                            <?php
                            echo $customerDetail["address"];
                            ?>
                        </div>
                    </div>
                    <div class="row pt-2 pb-2">
                        <span>Not the address you want?</span>
                    </div>
                    <button class="btn btn-outline-primary mt-3 mb-5" data-bs-toggle='modal' data-bs-target='#AddressEditModal'>Update Address Here</button>

                    <hr>

                    <span><b>Contact Details</b></span>
                    <div class="row pt-2 pb-1">
                        <div class="col-3">
                            <span>
                                Name
                            </span>
                        </div>
                        <div class="col-1">
                            <span>:</span>
                        </div>
                        <div class="col-8">
                            <?php
                            echo $customerDetail["first_name"] . ' ' . $customerDetail["last_name"];
                            ?>
                        </div>
                    </div>
                    <div class="row pb-1">
                        <div class="col-3">
                            <span>
                                Phone Number:
                            </span>
                        </div>
                        <div class="col-1">
                            <span>:</span>
                        </div>
                        <div class="col-8">
                            <?php
                            echo $customerDetail["mobile_number"];
                            ?>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-3">
                            <span>
                                Email:
                            </span>
                        </div>
                        <div class="col-1">
                            <span>:</span>
                        </div>
                        <div class="col-8">
                            <?php
                            echo $customerDetail["email"];
                            ?>
                        </div>
                    </div>

                    <hr>

                    <!-- <span><b>Payment Methods</b></span>
                    <div class="row pt-2">
                        <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="success-outlined">Checked success radio</label>

                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                        <label class="btn btn-outline-danger" for="danger-outlined">Danger radio</label>
                    </div> -->

                </div>

                <div class="col-4 bg-light text-dark h-100">
                    <span><b>Your Order Details</b></span>
                    <?php
                    while ($customerCart = mysqli_fetch_array($customerCartResult)) {
                        $prodId = $customerCart["product_id"];
                        $getProductQuery = "SELECT * FROM products WHERE product_id = $prodId";
                        $productsResult = mysqli_query($con, $getProductQuery);
                        $products = mysqli_fetch_array($productsResult);

                        echo '<div class="row pt-2 pb-2">';
                        echo '<div class="col-2">';
                        echo '<span><b>' . $customerCart["quantity"] . '</b> x</span>';
                        echo '</div>';
                        echo '<div class="col-7">';
                        echo $products["product_name"];
                        echo '</div>';
                        echo '<div class="col-3">';
                        echo '<span class="float-end">RM' . number_format(($products["price"] * $customerCart["quantity"]), 2, '.', '') . '</span>';
                        echo '</div>';
                        echo '</div>';
                        $subtotal += ($products["price"] * $customerCart["quantity"]);
                        $total += ($products["price"] * $customerCart["quantity"]);
                    }
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-9">
                            <span>Subtotal</span>
                        </div>
                        <div class="col-3">
                            <span class="float-end">RM<?php echo number_format($subtotal, 2, '.', '') ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span>Delivery Fee</span>
                        </div>
                        <div class="col-3">
                            <span class="float-end">RM<?php echo number_format($deliveryFee, 2, '.', '') ?></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-9">
                            <span><b>Total<small>(Including Delivery Fee)</small></b></span>
                        </div>
                        <div class="col-3">
                            <b>RM<span id="toPay" class="float-end" value="<?php echo $total ?>"><?php echo number_format($total, 2, '.', '') ?></span></b>
                        </div>
                    </div>

                    <div id="paypal-payment-button">

                    </div>

                </div>

            </div>

        </div>


        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>
    <script src="https://www.paypal.com/sdk/js?client-id=AUSyV6rEK-S34PK4yfYbhOb2KqWW9uDpYGB-Hnt8KHpc7Hvo8K5I5CrAnvNz-0xJy1MimuuavIt3QtXL&currency=MYR"></script>
    <script>
        var amountToPay = document.getElementById("toPay").innerHTML;

        paypal.Buttons({
            style: {
                shape: 'pill'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amountToPay
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(payment) {
                    window.location = 'payment_success.php?pay=' + payment.id;
                })
            },
            onCancel: function(data) {
                window.location.replace("Oncancel.php")
            },

        }).render('#paypal-payment-button');
    </script>
</body>

</html>