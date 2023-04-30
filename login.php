<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1, false);

include 'protected/db.inc.php';
include 'tools/user_login.php';

if (isset($_POST["username"])) {

    $error = user_login($db, $_POST["username"], $_POST["password"], true);

}

$db->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="resources/css/login.css" />
</head>
<body>
<div class="login-wrapper">
    <div class="login">
        <h1>NX1C</h1>
        <p>User Login</p>
        <?php if (isset($error)) echo '<h4 style="color: red; margin-bottom: 10px;">Incorrect Login Details Used</h4>'; ?>
        <form method="POST" enctype="application/x-www-form-urlencoded">
            <input type="text" placeholder="Username" name="username" autocomplete="off" required />
            <input type="password" placeholder="Password" name="password" autocomplete="off" required />
            <input type="reset" value="Cancel" class="spacing" />
            <input type="submit" value="Login" />
        </form>
    </div>
</div>
</body>
</html>