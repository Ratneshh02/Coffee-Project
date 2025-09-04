<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css"><title>Admin Dashboard</title></head>
<body>
<h2>Welcome Admin</h2>
<a href="addproduct.php">Add Product</a> | 
<a href="viewproduct.php">View Products</a> |
<a href="../logout.php">Logout</a>
</body>
</html>
