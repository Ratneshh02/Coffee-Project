<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $email;
        header("location: admin/adminhome.php");
    } else {
        $query2 = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result2 = mysqli_query($con, $query2);
        if (mysqli_num_rows($result2) > 0) {
            $_SESSION['user'] = $email;
            header("location: user/home.php");
        } else {
            echo "Invalid credentials!";
        }
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css"><title>Bakelore Shop</title></head>
<body>
<h2>Bakelore</h2>
<form method="post">
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="login" value="Login">
</form>
</body>
</html>
