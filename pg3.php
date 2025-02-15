<?php 
session_start();
include 'functions.php';

$subtotal = isset($_SESSION['subtotal']) ? $_SESSION['subtotal'] : 0;
$flotr = 0.095;
$tax = $subtotal * $flotr;
$total = $subtotal + $tax;
$_SESSION['total'] = $total;  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tax Calculation</title>
</head>
<body>

    <p>Subtotal: $<?= number_format($subtotal, 2) ?></p>
    <p>Tax: $<?= number_format($tax, 2) ?></p>
    <p>Total: $<?= number_format($total, 2) ?></p>

   
    <form action="login.php" method="post">
        <input type="submit" value="Login to proceed to Checkout">
    </form>

 
    <form action="index.php" method="post">
        <input type="submit" value="Continue Shopping/Restart">
    </form>

</body>
</html>

<!--
Subtotal: $
Tax: $ (use Florence tax rate) 9.5%
Total: $
Proceed to Checkout button
Continue Shopping button
-->