<?php
session_start();

$con = mysqli_connect("localhost", "admin", null, "pganim");

error_reporting(0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "select * from employees where email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
<link rel = "icon" href = "images/poggo-icon.png" type = "image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Poggo Animation - Staff Login</title>
</head>

<body>
    <div class="login-body">
        <div class="container-login">
            <form action="" method="POST" class="login-email">
                <img class="img-center" src="images/poggo.png">
                <br>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>