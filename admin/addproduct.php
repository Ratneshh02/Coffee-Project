<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['admin'])) {
    header("location: ../login.php");
}
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$image);
    $query = "INSERT INTO products(name, description, price, image) VALUES('$name','$desc','$price','$image')";
    mysqli_query($con, $query);
    echo "Product Added!";
}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css"><title>Add Coffee Product</title></head>
<body>
<h2>Add Coffee Product</h2>
<form method="post" enctype="multipart/form-data">
Name: <input type="text" name="name"><br>
Description: <textarea name="description"></textarea><br>
Price: <input type="text" name="price"><br>
Image: <input type="file" name="image"><br>
<input type="submit" name="add" value="Add Product">
</form>
</body>
</html>
