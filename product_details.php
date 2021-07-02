<!DOCTYPE html>
<html>
<?php
session_start();
include 'header.php';
?>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
</head>

<body>


    <!-- page wrapper class -->
    <div class="page-wrapper">

        <!-- START BELOW HERE -->
        <?php
        $con = mysqli_connect("localhost", "admin", null, "pganim");
        if (isset($_GET['ae'])) {
            $addResult = $_GET['ae'];
            if ($addResult == 'true') {
                echo '<script>window.alert("Failed, product already within cart...");</script>';
            } else if ($addResult == 'false') {
                echo '<script>window.alert("Product successfully added to cart...");</script>';

            }
        }
        if (isset($_GET['pid'])) {
            $product_id = $_GET['pid'];
        } else {
            $product_id = '1';
        }
        $getProductDetailQuery = "SELECT * FROM products WHERE product_id = $product_id";
        $productDetailResult = mysqli_query($con, $getProductDetailQuery);
        $proddetail = mysqli_fetch_array($productDetailResult);
        ?>
        <div class="quicksand-font" style="display: flex; width: 100%;">
            <div style="width: 50%; text-align: center;">
                <?php
                // if (mysqli_num_rows($productDetailResult) == 0 ) {
                //     echo '<p>NO PRODUCT DETAILS FOUND.</p>';
                // }
                echo '<div style="margin: 30px 0"; width: 100%;>';
                echo '<img src="images/' . $proddetail["img"] . '" alt="' . $proddetail["product_name"] . '" style="border: solid 1px #E3E3E3; padding: 10px; margin-bottom: 10px;" width="500">';
                echo '</div>';

                ?>
            </div>
            <div style="width: 50%; margin: 30px 30px 30px 50px; padding: 20px;">
                <div style="display: block; margin-bottom: 10px;">
                    <?php
                    echo '<span style="font-size: 24px;"><b>' . $proddetail["product_name"] . '</b></span>';
                    ?>
                </div>
                <div style="display: block; margin-bottom: 30px;">
                    <?php
                    echo '<span style="font-size: 20px; color: #EE316D;">RM' . $proddetail["price"] . '</span>';
                    ?>
                </div>
                <?php
                // $productsize = array('Large' => 'large', 'Medium' => 'medium', 'Small' => 'small');
                // if (count($productsize) > 0) {
                //     echo '<div style="display: block; margin: 10px 0 10px 0;">';
                //     echo '<select id="product-size" name="product-size" style="width: 400px; height: 40px; font-size: 20px;">';
                //     foreach ($productsize as $size => $keysize) {
                //         echo '<option value="' . $keysize . '">' . $size . '</option>';
                //     }
                //     echo '</select>';
                //     echo '</div>';
                // }
                ?>
                <div style="display: block; margin: 10px 0 10px 0;">
                    <label for="product-number" style="display: inline-block; width: 100px;"><span style="font-size: 20px;">Amount </span></label>
                    <input required id="product-number" name="product-number" type="number" value="1" min="1" style="width: 50px; height: 35px; font-size: 20px;">
                </div>
                <div style="display: block; margin: 50px 0 10px 0;">
                    <span style="font-size: 24px;"><b>Product Description</b></span>
                    <?php
                    echo '<div style="padding: 10px; font-size: 20px;">';
                    echo $proddetail["description"];
                    echo '</div>';
                    ?>
                </div>
                <div style="display: block; margin-top: 50px;">
                    <button id="addproduct" onclick="AddToCart(<?php echo $product_id ?>)" style="cursor: pointer; border: none; margin: 10px; padding-top: 20px; padding-bottom: 20px; background-color: #4BB7D4; color: white; font-size: 20px; width: 40%;">Add to Cart</button>
                    <button style="cursor: pointer; border: none; margin: 10px; padding-top: 20px; padding-bottom: 20px; background-color: #F4BA4C; color: white; font-size: 20px; width: 40%;">Buy Now</button>
                </div>
            </div>
        </div>





        <!-- END HERE -->
    </div>

    <script>
        function AddToCart(pid) {
            var quant = document.getElementById('product-number').value;
            var newUrl = 'add_to_cart.php?pid=' + pid + '&quant=' + quant;
            window.location.href = newUrl;
        }
    </script>

    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>