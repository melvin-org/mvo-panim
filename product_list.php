<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .product-button {
            background-color: #4BB7D4;
            border: none;
            border-radius: 0px;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 150px;
        }
        .selected-product-button {
            background-color: #F4BA4C;
            border: none;
            border-radius: 0px;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 150px;
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

        $categories = array('1' => 'Jan 2018', '2' => 'Dec 2018', '3' => 'Jan 2019');
        $selectedCat = $_GET['catid'];

        ?>
        <div class="quicksand-font" style="width: 100%;">
            <div style="width: 100%; text-align: center;">
                <span style="font-size: 24px;">Products</span>
            </div>
            <div style="display: flex; width: 100%;">
                <!-- Navigation part -->
                <div style="width: 10%; font-size: 20px;">
                        <?php
                        foreach ($categories as $catid => $catname) {
                            echo '<div style="width: 100%; text-align: center;">';
                            if ($selectedCat == $catid) {
                                echo '<a href="product_list.php?catid='.$catid.'"><button class="selected-product-button">'.$catname.'</button></a>';
                            } else {
                                echo '<a href="product_list.php?catid='.$catid.'"><button class="product-button">'.$catname.'</button></a>';

                            }
                            echo '</div>';
                        }
                        ?>
                </div>

                <!-- Product display part -->
                <div style="width: 90%">
                <?php
                    if ($selectedCat == 1) {
                        echo '<span>Jan 2018 is selected</span>';
                    } else if ($selectedCat == 2){
                        echo '<span>Dec 2018 is selected</span>';
                    } else if ($selectedCat == 3){
                        echo '<span>Jan 2019 is selected</span>';
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