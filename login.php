<!DOCTYPE html>
<?php
session_start();

$con = mysqli_connect("localhost", "admin", null, "pganim");

error_reporting(0);

if (isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = md5($_POST['loginPassword']);

    $query = "select * from customers where email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['first_name'] = $row['first_name'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Whoops! Email or Password is Wrong.')</script>";
    }
}

?>
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

        <div class="quicksand-font" style="width: 100%;">
            <form action="home.php" method="post">
                <div style="width: 100%; padding-top: 20px; padding-bottom: 20px; text-align: center;">
                    <span style="font-size: 24px;">Login</span>
                </div>
                <table style="font-size: 20px; margin-left: auto; margin-right: auto;">
                    <tr>
                        <td style="width: 100px; padding-left: 5px;">
                            Email
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 400px;">
                            <input style="width: 100%; height: 30px;" type="text" id="loginEmail" placeholder="Email..." required>
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; padding-left: 5px;">
                            Password
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input style="width: 100%; height: 30px;" type="password" id="loginPassword" placeholder="Password..." required>
                        </td>
                    </tr>
                </table>
                <div style="width: 100%; padding-top: 40px; padding-bottom: 20px; text-align: center;">
                    <button name="login" style="border: none; background-color: #4BB7D4; color: white; padding: 10px 50px; font-size: 18px; cursor: pointer;">LOGIN</button>
                </div>
                <div style="width: 100%; text-align: center;">
                    <span style="font-size: 18px;"><a href="signup.php">SIGN UP HERE</a></span>
                </div>
            </form>
        </div>

        <!-- END HERE -->
    </div>



    <!--Get footer -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>