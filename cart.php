<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        /* unvisited link */
        a:link {
            color: #4BB7D4;
        }

        /* visited link */
        a:visited {
            color: #4BB7D4;
        }

        /* mouse over link */
        a:hover {
            color: #4BB7D4;
        }

        /* selected link */
        a:active {
            color: #4BB7D4;
        }
    </style>

</head>

<body>

    <!--Get header -->
    <?php
    include 'header.php';
    ?>

    <!-- page wrapper class -->
    <div class="page-wrapper">

        <!-- START BELOW HERE -->
        <?php
        $subtotal = 0;
        ?>

        <div class="quicksand-font" style="width: 100%;">
            <div style="width: 100%; text-align: center;">
                <span style="font-size: 24px;">
                    Your cart
                </span>
            </div>
            <div style="width: 100%; display: flex; font-size: 20px; padding: 60px 0 30px 0;">
                <div style="width: 55%; padding-left: 20px;">
                    <span>Product</span>
                </div>
                <div style="width: 15%;">
                    <span>Price</span>
                </div>
                <div style="width: 15%;">
                    <span>Quantity</span>
                </div>
                <div style="width: 15%;">
                    <span>Total</span>
                </div>
            </div>
            <hr>
            <!-- loop this -->
            <div style="width: 100%; display: flex;">
                <div style="width: 55%; display: flex; padding-left: 20px;">
                    <div style="width: 20%">
                        <img src="cat.jpg" alt="cat-pic" width="150" height="150">
                    </div>
                    <div style="width: 80%; font-size: 20px; color: #696969;">
                        <div style="width: 100%; padding-top: 10px;">
                            <span>Product Name</span>
                        </div>
                        <div style="width: 100%; padding-top: 10px;">
                            <span>Size: <?php echo 'Small' ?></span>
                        </div>
                        <div style="width: 100%; padding-top: 10px;">
                            <span class="remove-button"><u>Remove</u></span>
                        </div>
                    </div>
                </div>
                <div style="width: 15%; padding-top: 10px;">
                    <span style="font-size: 20px; color: #696969;">
                        <?php
                        $price = 300;
                        echo 'RM' . $price;
                        ?>
                    </span>
                    <input type="hidden" class="cprice" value="<?php echo $price ?>">
                </div>

                <div style="width: 15%; padding-top: 5px;">
                    <?php
                    $quantity = 1;
                    ?>
                    <input class="cquantity" onchange="total()" type="number" value="<?php echo $quantity ?>" min="1" style="width: 50px; height: 35px; font-size: 20px;">
                </div>
                <div style="width: 15%; padding-top: 10px; font-size: 20px; color: #696969;">
                    RM<span class="ctotal">
                        <?php echo $total; ?>
                    </span>
                </div>
            </div>

            <div style="width: 100%; display: flex; text-align: right;">
                <div style="width: 70%;"></div>
                <div style="width: 15%; font-size: 20px;">
                    <span>Subtotal</span>
                </div>
                <div style="width: 15%; font-size: 20px;">
                    RM<span class="csubtotal"> <?php echo $subtotal ?> </span>
                </div>

            </div>
            <div style="width: 100%; display: flex; text-align: right; padding-top: 20px;">
                <div style="width: 70%;"></div>
                <div style="width: 30%; font-size: 20px;">
                    <span>Tax Inclusive.</span>
                </div>
            </div>
            <div style="width: 100%; display: flex; text-align: right; padding-top: 20px;">
                <div style="width: 80%;"></div>
                <div style="width: 10%; padding-top: 20px;">
                    <a href="product_details.php">
                        <span class="continue-shopping" style="font-size: 20px;">
                            Continue Shopping
                        </span>
                    </a>
                </div>
                <div style="width: 10%; font-size: 20px;">
                    <button class="checkout-button">
                        Checkout
                    </button>
                </div>
            </div>
        </div>


    </div>

    <script>
        var cprice = document.getElementsByClassName('cprice');
        var cquantity = document.getElementsByClassName('cquantity');
        var ctotal = document.getElementsByClassName('ctotal');
        var csubtotal = document.getElementsByClassName('csubtotal');

        function total() {
            for (i = 0; i < cprice.length; i++) {
                ctotal[i].innerText = (cprice[i].value) * (cquantity[i].value);
                csubtotal[i].innerText = (cprice[i].value) * (cquantity[i].value);
            }
        }

        total();
    </script>


    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>


</body>

</html>