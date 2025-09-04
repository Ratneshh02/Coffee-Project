<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['user'])) {
    header("location: ../login.php");
    exit;
}

$user_email = $_SESSION['user'];
$u = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user WHERE email='$user_email'"));
$user_id = $u ? $u['id'] : 0;

$q = "
SELECT c.id as cart_id, c.qty, p.id as pid, p.name, p.price, p.image
FROM cart c
JOIN products p ON p.id = c.product_id
WHERE c.user_id = $user_id
ORDER BY c.id DESC
";
$res = mysqli_query($con, $q);

// compute total
$total = 0;
$items = [];
while ($row = mysqli_fetch_assoc($res)) {
    $items[] = $row;
    $total += ($row['price'] * $row['qty']);
}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css"><title>Your Cart</title></head>
<body>
<h2>Your Cart</h2>
<a href="home.php">Continue Shopping</a> | <a href="../logout.php">Logout</a>
<hr>

<?php if (count($items) == 0) { ?>
    <p>Cart is empty.</p>
<?php } else { ?>
<form method="post" action="cart.php?action=update">
<div class="table-container">
<table border="1" cellpadding="6" cellspacing="0">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Line Total</th>
    <th>Action</th>
</tr>
<?php foreach($items as $it) { ?>
<tr>
    <td><?php if($it['image']) { ?><img src="../images/<?php echo $it['image']; ?>" width="70"><?php } ?></td>
    <td><?php echo $it['name']; ?></td>
    <td><?php echo $it['price']; ?></td>
    <td>
        <input type="hidden" name="cid[]" value="<?php echo $it['cart_id']; ?>">
        <input type="number" name="qty[]" value="<?php echo $it['qty']; ?>" min="1" style="width:60px;">
    </td>
    <td><?php echo number_format($it['price'] * $it['qty'], 2); ?></td>
    <td><a href="cart.php?action=remove&cid=<?php echo $it['cart_id']; ?>">Remove</a></td>
</tr>
<?php } ?>
<tr>
    <td colspan="4" align="right"><b>Total:</b></td>
    <td colspan="2"><b><?php echo number_format($total, 2); ?></b></td>
</tr>
</table>
</div>
<br>
<input type="submit" value="Update Quantities">
</form>
<?php } ?>

</body>
</html>
