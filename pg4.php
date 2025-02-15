<?php 
session_start();
include 'functions.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['from_login']) || $_SESSION['from_login'] !== true) {
    header("Location: index.php");
    exit();
}
$name = $cardnum = $cardtype = $expdate = $seccode = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST["name"] ?? '');
    $cardnum = test_input($_POST["cardnum"] ?? '');
    $cardtype = test_input($_POST["cardtype"] ?? '');
    $expdate = test_input($_POST["expdate"] ?? '');
    $seccode = test_input($_POST["seccode"] ?? '');
    $message = validator($cardnum, $cardtype);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout</title>
    </head>
    <body>
        <p> Total: $<?= number_format($_SESSION['total'], 2) ?></p>

        <form action="" method="POST">
            <p>Name on Card: <input type="text" name="name" required></p>
            <p>Card Type:
                <select name="cardtype" required>
                    <option value="VISA">VISA</option>
                    <option value="MASTERCARD">MASTERCARD</option>
                    <option value="AMEX">AMEX</option>
                </select>
            </p>
            <p>Card Number: <input type="text" name="cardnum" required></p>
            <p>Expiration Date [MM/YY]: <input type="text" name="expdate" required></p>
            <p>Security Code: <input type="text" name="seccode" required></p>
            <input type="submit" value="Submit">
        </form>

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

    </body>
</html>



<!--
Total:
Name on Card:
Type of Card:
Card Number:
Exp Date[mm/yy]:
Security Code:
Submit button

if CC# invalid:"Invalid card number"
if CC# accepted:"Card accepted, thank you for your purchase!"


-Cards Accepted are
MASTERCARD Prefix=51-55, Length=16
VISA Prefix=4, Length=13 or 16
AMEX Prefix=34 or 37, Length=15

-->