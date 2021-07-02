<!DOCTYPE html>
<html>
<?php
include 'includes/session.php';
include 'header.php';
?>


<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        a {
            color: #4BB7D4;
        }
    </style>

</head>

<body>

    <!-- page wrapper class -->
    <div class="page-wrapper">

        <!-- START BELOW HERE -->
        <?php
        $custid = $_SESSION['cust_id'];
        $subtotal = 0;
        $con = mysqli_connect("localhost", "admin", null, "pganim");

        $getCustomerCartQuery = "SELECT * FROM cart WHERE customer_id = $custid";
        $customerCartResult = mysqli_query($con, $getCustomerCartQuery);
        ?>

        <div class="quicksand-font" style="width: 100%;">
            <div style="width: 100%; text-align: center;">
                <span style="font-size: 24px;">
                    Your Cart
                </span>
            </div>
            <?php
            if(mysqli_num_rows($customerCartResult) == 0){
                echo '<br><div class="text-center"><p style="font-size:18px;">You have not added any products to your cart!</p></div>';
            }else{
            ?>
            <div style="width: 100%; display: flex; font-size: 20px; padding: 60px 0 10px 0;">
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
            <?php
            
            while ($cart = mysqli_fetch_array($customerCartResult)) {
                $CartProdId = $cart["product_id"];
                $getProductQuery = "SELECT * FROM products WHERE product_id = $CartProdId";
                $productsResult = mysqli_query($con, $getProductQuery);
                $products = mysqli_fetch_array($productsResult);

                echo '<div style="width: 100%; display: flex; padding-bottom: 20px;">';
                echo '<div style="width: 55%; display: flex; padding-left: 20px;">';
                echo '<div style="width: 20%">';
                echo '<img src="images/' . $products["img"] . '" alt="' . $products["product_name"] . '" width="150" height="150">';
                echo '</div>';
                echo '<div style="width: 80%; font-size: 20px; color: #696969;">';
                echo '<div style="width: 100%; padding-top: 10px;">';
                echo '<span>' . $products["product_name"] . '</span>';
                echo '</div>';
                // echo '<div style="width: 100%; padding-top: 10px;">';
                // echo '<span>Size: Small</span>';
                // echo '</div>';

                echo '<div style="width: 100%; padding-top: 10px;">';
                echo '<a href="cart_delete.php?pid=' . $cart["product_id"] . '"><span class="remove-button"><u>Remove</u></span></a>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '<div style="width: 15%; padding-top: 10px;">';
                echo '<span style="font-size: 20px; color: #696969;">' . $products["price"] . '</span>';
                echo '<input type="hidden" class="cprice" value="' . $products["price"] . '">';
                echo '</div>';
                echo '<div style="width: 15%; padding-top: 5px;">';
                echo '<input class="cquantity" onchange="total()" type="number" value="' . $cart["quantity"] . '" min="1" style="width: 50px; height: 35px; font-size: 20px;">';
                echo '</div>';
                echo '<div style="width: 15%; padding-top: 10px; font-size: 20px; color: #696969;">';
                echo 'RM<span class="ctotal">' . $cart["quantity"] * $products['price'] . '</span>';
                echo '</div>';
                echo '</div>';
            }
            ?>
            <div style="width: 100%; display: flex;">
                <div style="width: 70%;"></div>
                <div style="width: 15%; font-size: 20px; padding-right: 20px;">
                    <span>Subtotal</span>
                </div>
                <div style="width: 15%; font-size: 20px; padding-right: 20px;">
                    RM<span id="csubtotal" class="csubtotal">subtotal</span>
                </div>
            </div>
            <div style="width: 100%; display: flex; padding-top: 50px; padding-right: 20px;">
                <div style="width: 70%;"></div>
                <div style="width: 13%; padding-top: 20px;">
                    <a href="product_list.php">Continue Shopping</span></a>
                </div>
                <div style="width: 17%; font-size: 20px;">
                    <a href="checkout.php">
                        <button class="checkout-button">
                            Checkout
                        </button>
                    </a>
                </div>
            </div>
            <?php
            }
            ?>

        </div>


    </div>

    <script>
        var cprice = document.getElementsByClassName('cprice');
        var cquantity = document.getElementsByClassName('cquantity');
        var ctotal = document.getElementsByClassName('ctotal');
        var csubtotal = document.getElementById('csubtotal');

        function total() {
            var subtotal = 0;
            for (i = 0; i < cprice.length; i++) {
                ctotal[i].innerText = (cprice[i].value) * (cquantity[i].value);
                subtotal += (cprice[i].value) * (cquantity[i].value);
            }
            csubtotal.innerText = subtotal;

        }

        total();
    </script>


    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>


</body>

</html>