<?php 

session_start();
include 'functions.php';

$snickers = $skittles = $starburst = "";
$displayItems = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['items'])) {
    $displayItems = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $snickers = isset($_POST["snickers"]) ? test_input($_POST["snickers"]) : 0;
    $skittles = isset($_POST["skittles"]) ? test_input($_POST["skittles"]) : 0;
    $starburst = isset($_POST["starburst"]) ? test_input($_POST["starburst"]) : 0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Items</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="submit" name="items" value="Press this button if you want to see the items for sale.">
        </form>
        <?php if ($displayItems): ?>
            <p>How much of each item do you want?</p>
            <form action="pg2.php" method="post">
                Snickers ($1.50):<input type="text" name="snickers"><br>
                Skittles ($1.25):<input type="text" name="skittles" ><br>
                Starburst($1.00):<input type="text" name="starburst"><br>
                <input type="submit" value="Submit">
            </form>

        <?php endif; ?>
    </body>
</html>


