<link rel="stylesheet" href="../css/style.css">
<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['user'])) {
    header("location: ../login.php");
    exit;
}

// get current user id from email in session
$user_email = $_SESSION['user'];
$u = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user WHERE email='$user_email'"));
$user_id = $u ? $u['id'] : 0;

$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'add') {
    $pid = intval($_GET['pid']);
    // check if already in cart -> increment
    $chk = mysqli_query($con, "SELECT * FROM cart WHERE user_id=$user_id AND product_id=$pid");
    if (mysqli_num_rows($chk) > 0) {
        mysqli_query($con, "UPDATE cart SET qty = qty + 1 WHERE user_id=$user_id AND product_id=$pid");
    } else {
        mysqli_query($con, "INSERT INTO cart (user_id, product_id, qty) VALUES ($user_id, $pid, 1)");
    }
    header("location: viewcart.php");
    exit;
}

if ($action == 'remove') {
    $cid = intval($_GET['cid']); // cart row id
    mysqli_query($con, "DELETE FROM cart WHERE id=$cid AND user_id=$user_id");
    header("location: viewcart.php");
    exit;
}

if ($action == 'update' && isset($_POST['cid']) && isset($_POST['qty'])) {
    // arrays from form
    $cids = $_POST['cid'];
    $qtys = $_POST['qty'];
    for ($i=0; $i<count($cids); $i++) {
        $cid = intval($cids[$i]);
        $q = intval($qtys[$i]);
        if ($q < 1) $q = 1;
        mysqli_query($con, "UPDATE cart SET qty=$q WHERE id=$cid AND user_id=$user_id");
    }
    header("location: viewcart.php");
    exit;
}

// default: go back
header("location: viewcart.php");
