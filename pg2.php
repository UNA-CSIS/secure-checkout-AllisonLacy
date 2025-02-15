<?php 
session_start();
//ask if need to re-validate for each page?
include 'functions.php';

$num_snickers = isset($_POST["snickers"]) && is_numeric($_POST["snickers"]) ? $_POST["snickers"] : 0;
$num_skittles = isset($_POST["skittles"]) && is_numeric($_POST["skittles"]) ? $_POST["skittles"] : 0;
$num_starburst = isset($_POST["starburst"]) && is_numeric($_POST["starburst"]) ? $_POST["starburst"] : 0;

$snickers = $num_snickers * 1.50;
$skittles = $num_skittles * 1.25;
$starburst = $num_starburst * 1.00;

$subtotal = $snickers  + $skittles + $starburst;

$_SESSION['subtotal'] = $subtotal;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Summary</title>
    </head>
    <body>
        <p>Snickers: <?= $num_snickers ?> * $1.50 = $<?= number_format($snickers, 2)?></p>
        <p>Skittles: <?= $num_skittles ?> * $1.25 = $<?= number_format($skittles, 2)?></p>
        <p>Starburst: <?= $num_starburst ?> * $1.00 = $<?= number_format($starburst, 2)?></p>   
        
        <?php
        echo "Your subtotal is \$" . number_format($subtotal, 2);
        ?>
        <form action="pg3.php" method="post">
            <input type="submit" value="Confirm Order">
        </form>
    </body>
</html>


<!--
Order Summary
Subtotal
confirm button
-->
