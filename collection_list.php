<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .not-selected-button {
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

        .selected-button {
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
        $getCollectionQuery = "SELECT * FROM collections";
        $collectionResult = mysqli_query($con, $getCollectionQuery);
        if (isset($_GET['colid'])) {
            $selectedCollection = $_GET['colid'];
        } else {
            $selectedCollection = '1';
        }
        $getCollectionNameQuery = "SELECT * FROM collections WHERE collection_id = $selectedCollection";
        $collectionNameResult = mysqli_query($con, $getCollectionNameQuery);
        $collectionName = mysqli_fetch_array($collectionNameResult);

        $getProductsCollectionQuery = "SELECT * FROM products WHERE collection_id = $selectedCollection";
        $productResult = mysqli_query($con, $getProductsCollectionQuery);

        ?>
        <div class="quicksand-font" style="width: 100%;">
            <div style="width: 100%; text-align: center; padding-top: 30px; padding-bottom: 30px;">
                <span style="font-size: 24px;">Products in <?php echo $collectionName['collection_name']; ?> Collection</span>
            </div>
            <div style="display: flex; width: 100%;">
                <!-- Navigation part -->
                <div style="width: 10%; font-size: 20px;">
                    <div style="width: 100%; text-align: center;">

                        <?php
                        if (mysqli_num_rows($collectionResult) == 0) {
                            echo "<p>NO COLLECTIONS FOUND.</p>";
                        } else {
                            while ($collection = mysqli_fetch_array($collectionResult)) {
                                if ($selectedCollection == $collection['collection_id']) {
                                    echo '<a href="collection_list.php?colid=' . $collection['collection_id'] . '"><button class="selected-button">' . $collection['collection_name'] . '</button></a>';
                                } else {
                                    echo '<a href="collection_list.php?colid=' . $collection['collection_id'] . '"><button class="not-selected-button">' . $collection['collection_name'] . '</button></a>';
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
                        echo "<p>NO PRODUCTS FOUND IN THIS COLLECTION.</p>";
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