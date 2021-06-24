<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <!--Get header -->
    <?php
    include 'header.php';
    ?>

    <!-- page wrapper class -->
    <div class="page-wrapper">

        <!-- START BELOW HERE -->
        <div class="quicksand-font" style="display: flex; width: 100%;">
            <div style="width: 30%; text-align: center;">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo '<div style="margin: 30px 0 30px 0">';
                    echo '<img src="cat.jpg" alt="cat" style="border: solid 1px #E3E3E3; padding: 10px;" width="140">';
                    echo '</div>';
                }
                ?>
            </div>
            <div style="width: 30%; text-align: center;">
                <?php
                echo '<div style="margin: 30px 0 30px 0"; width: 100%;>';
                echo '<img src="cat.jpg" alt="cat" style="border: solid 1px #E3E3E3; padding: 10px; margin-bottom: 10px;" width="420">';
                echo '<img src="cat.jpg" alt="cat" style="border: solid 1px #E3E3E3; padding: 10px;" width="420">';
                echo '</div>';
                ?>
            </div>
            <div style="width: 40%; margin: 30px 30px 30px 50px; padding: 20px;">
                <div style="display: block; margin-bottom: 10px;">
                    <?php
                    echo '<span style="font-size: 24px;"><b>Product Name</b></span>';
                    ?>
                </div>
                <div style="display: block; margin-bottom: 30px;">
                    <?php
                    echo '<span style="font-size: 20px; color: #A9A9A9;">RM300</span>';
                    ?>
                </div>
                <?php
                $productsize = array('Large' => 'large', 'Medium' => 'medium', 'Small' => 'small');
                if (count($productsize) > 0) {
                    echo '<div style="display: block; margin: 10px 0 10px 0;">';
                    echo '<select id="product-size" name="product-size" style="width: 400px; height: 40px; font-size: 20px;">';
                    foreach ($productsize as $size => $keysize) {
                        echo '<option value="' . $keysize . '">' . $size . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
                ?>
                <!-- <div style="display: block; margin: 10px 0 10px 0;">
                    <select id="product-size" name="product-size" style="width: 400px; height: 40px; font-size: 20px;">
                        <option value="large"> Size: Large</option>
                        <option value="medium"> Size: Medium</option>
                        <option value="small"> Size: Small</option>
                    </select>
                </div> -->
                <!-- <div style="display: block; margin: 10px 0 10px 0;">
                    <label for="product-colour" style="display: inline-block; width: 100px;"><span style="font-size: 18px;">Colour </span></label>
                    <select id="product-colour" name="product-colour" style="width: 250px; height: 30px; font-size: 18px;">
                        <option value="black">Black</option>
                        <option value="white">White</option>
                    </select>
                </div> -->
                <div style="display: block; margin: 10px 0 10px 0;">
                    <label for="product-number" style="display: inline-block; width: 100px;"><span style="font-size: 20px;">Amount </span></label>
                    <input id="product-number" name="product-number" type="number" value="1" min="1" style="width: 290px; height: 35px; font-size: 20px;">
                </div>
                <div style="display: block; margin: 50px 0 10px 0;">
                    <span style="font-size: 24px;"><b>Product Description</b></span>
                    <?php
                    echo '<div style="padding: 10px; font-size: 20px;">';
                    echo '- This is a very long product detail to mimic the original product detail This is a very long product detail to mimic the original product detail This is a very long product detail to mimic the original product detail This is a very long product detail to mimic the original product detail.';
                    echo '</div>';
                    ?>
                </div>
                <div style="display: block; margin-top: 50px;">
                    <button style="cursor: pointer; border: solid 1px black; margin: 10px; padding-top: 20px; padding-bottom: 20px; background-color: transparent; color: black; font-size: 20px; width: 60%;">Add to Cart</button>
                    <button style="cursor: pointer; border: solid 1px black; margin: 10px; padding-top: 20px; padding-bottom: 20px; background-color: transparent; color: black; font-size: 20px; width: 60%;">Buy Now</button>
                </div>
            </div>
        </div>









        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>