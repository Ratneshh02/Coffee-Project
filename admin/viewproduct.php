<?php
session_start();
include '../connection.php';
if (!isset($_SESSION['admin'])) {
    header("location: ../login.php");
    exit;
}
$res = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC");
?>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css"><title>View Products</title></head>
<body>
<h2>All Coffee Products</h2>
<a href="adminhome.php">Admin Home</a> | <a href="../logout.php">Logout</a>
<hr>
<div class="table-container">
<table border="1" cellpadding="6" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
</tr>
<?php while($r = mysqli_fetch_assoc($res)) { ?>
<tr>
    <td><?php echo $r['id']; ?></td>
    <td><?php if($r['image']) { ?><img src="../images/<?php echo $r['image']; ?>" width="80"><?php } ?></td>
    <td><?php echo $r['name']; ?></td>
    <td><?php echo $r['description']; ?></td>
    <td><?php echo $r['price']; ?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
