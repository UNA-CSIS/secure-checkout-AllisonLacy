
<?php 
session_start();
include 'functions.php';

$username = $password = $loginerror = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = test_input($_POST["username"] ?? '');
    $password = test_input($_POST["password"] ?? '');

    if ($username === $password && !empty($username) && !empty($password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['from_login'] = true;
        header("Location: pg4.php");
        exit();
    } else {
        $loginerror = "Username and password must be the same and neither can be left empty.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login to Continue</h1>
        <p>(Username and password must be the same)</p>

        <form action="login.php" method="post">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($loginerror)): ?>
            <p><?= $loginerror ?></p>
        <?php endif; ?>

    </body>
</html>




