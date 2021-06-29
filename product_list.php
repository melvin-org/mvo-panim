<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .product-button {
            font-family: Quicksand;
            background-color: transparent;
            border: none;
            border-radius: 0px;
            color: black;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 120px;
            cursor: pointer;
            font-size: 18px;
        }

        .selected-product-button {
            font-family: Quicksand;
            background-color: transparent;
            font-weight: bold;
            border: none;
            border-radius: 0px;
            color: black;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 120px;
            cursor: pointer;
            font-size: 18px;
        }

        .product-box {
            width: 250px;
            height: 380px;
            padding: 10px 20px;
            margin: 0 50px 100px 50px;
            color: black;
        }

        .product-box:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        /* unvisited link */
        a {
            color: black;
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
        $con = mysqli_connect("localhost", "admin", null, "pganim");
        $getCatQuery = "SELECT * FROM categories";
        $catResult = mysqli_query($con, $getCatQuery);
        if (isset($_GET['catid'])) {
            $selectedCat = $_GET['catid'];
        } else {
            $selectedCat = '0';
        }

        if ($selectedCat == '0') {
            $getProductsQuery = "SELECT * FROM products";
        } else {
            $getProductsQuery = "SELECT * FROM products WHERE category_id = $selectedCat";
        }

        $productResult = mysqli_query($con, $getProductsQuery);

        ?>
        <div class="quicksand-font" style="width: 100%;">
            <div style="width: 100%; text-align: center; padding-top: 30px; padding-bottom: 30px;">
                <span style="font-size: 24px;">Products</span>
            </div>
            <div style="display: flex; width: 100%;">
                <!-- Navigation part -->
                <div style="width: 10%; font-size: 20px;">
                    <div style="width: 100%; text-align: center;">

                        <?php
                        if (mysqli_num_rows($catResult) == 0) {
                            echo "<p>NO CATEGORIES FOUND.</p>";
                        } else {
                            if ($selectedCat == 0) {
                                echo '<a href="product_list.php?catid=0"><button class="selected-product-button">All</button></a>';
                            } else {
                                echo '<a href="product_list.php?catid=0"><button class="product-button">All</button></a>';
                            }
                            while ($category = mysqli_fetch_array($catResult)) {
                                if ($selectedCat == $category['category_id']) {
                                    echo '<a href="product_list.php?catid=' . $category['category_id'] . '"><button class="selected-product-button">' . $category['category_name'] . '</button></a>';
                                } else {
                                    echo '<a href="product_list.php?catid=' . $category['category_id'] . '"><button class="product-button">' . $category['category_name'] . '</button></a>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Product display part -->
                <div style="width: 90%; padding-left: 30px;">
                    <?php
                    if (mysqli_num_rows($productResult) == 0) {
                        echo "<p>NO PRODUCTS FOUND IN THIS CATEGORY.</p>";
                    } else {
                        echo '<div style="display: flex; flex-wrap: wrap; width: 100%;">';
                        while ($product = mysqli_fetch_array($productResult)) {
                            echo '<div class="product-box">';
                            echo '<a href="product_details.php?pid=' . $product["product_id"] . '" style="text-decoration: none;">';
                            echo '<div style="width: 100%;">';
                            echo '<img src="images/' . $product["img"] . '" width="250" height="250">';
                            echo '</div>';
                            echo '<div style="width: 100%; font-size: 18px; padding-top: 10px;">';
                            echo '<span>' . $product["product_name"] . '</span><br>';
                            echo '<span>RM' . $product["price"] . '</span>';
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                        }
                        echo '</div>';
                    }

                    ?>
                </div>
            </div>
        </div>



        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

    <script>

    </script>

</body>

</html>