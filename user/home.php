<div class="products">
<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['user'])) {
    header("location: ../login.php");
    exit;
}
$result = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC");
?>
</div>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css"><title>Coffee Shop</title></head>
<body>
<h2>Bakelore Shop</h2>
<a href="viewcart.php">View Cart</a>  <a href="../logout.php">Logout</a>
<hr>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div style="margin-bottom:15px;">
    <?php if($row['image']) { ?>
        <img src="../images/<?php echo $row['image']; ?>" width="100"><br>
    <?php } ?>
    <b><?php echo $row['name']; ?></b><br>
    <?php echo $row['description']; ?><br>
    Price: <?php echo $row['price']; ?><br>
    <a href="cart.php?action=add&pid=<?php echo $row['id']; ?>">Add to Cart</a>
</div>
<hr>
<?php } ?>
</body>
</html>
