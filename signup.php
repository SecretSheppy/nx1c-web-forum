<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1, false);

include 'protected/db.inc.php';
require('tools/generate_security_token.php');
include 'tools/SQLGen.php';
require('protected/create_account.php');

$error = (string) filter_input(INPUT_GET, "error", FILTER_DEFAULT);
$username = (string) filter_input(INPUT_POST, "username", FILTER_SANITIZE_ADD_SLASHES);
$password = (string) filter_input(INPUT_POST, "password", FILTER_SANITIZE_ADD_SLASHES);
$password_confirm = (string) filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_ADD_SLASHES);
$sql = new SQLGen();
$page = "default";

if ($username != null) {

    $sql->select("*")
        ->from("Users")
        ->where("UserName = '$username'");
    $username_search_results = $db->query($sql->get_statement());

    if ($username_search_results->num_rows == 0) {
        $token = generate_security_token("abcdefghijklmnopqrstuvwxyz", 50);
        create_account($db, $username, $password, $password_confirm, $token);
        $page = "account_created";
        $error = null;
    } else {
        header("Location: signup.php?error=Username+already+taken!");
        exit();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Sign Up</title>
    <link rel="stylesheet" href="resources/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<?php

if ($error != null) {
    echo <<< HTML
    <div class="alert">
        <p>Error: {$error}</p>
    </div>
    HTML;
}

?>
<div class="login-wrapper">
    <?php
    switch ($page) {
        case "default":
            echo <<< HTML
            <div class="login">
                <h1>NX1C</h1>
                <p>User Sign Up</p>
                <form method="POST" enctype="application/x-www-form-urlencoded">
                    <div class="label-wrapper">
                        <label for="username">Username</label>
                    </div>
                    <input id="username" type="text" placeholder="Enter your username" name="username" autocomplete="off" required />
                    <div class="label-wrapper">
                        <label for="password">Password</label>
                    </div>
                    <input id="password" type="password" placeholder="Enter your password" name="password" autocomplete="off" required />
                    <div class="label-wrapper">
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                    <input id="confirm-password" type="password" placeholder="Enter your password again" name="confirm-password" autocomplete="off" required />
                    <div class="button-wrapper">
                        <input type="reset" value="Cancel" class="spacing" />
                        <input type="submit" value="Sign Up" />
                    </div>
                </form>
                <div class="spacer">
                    <a href="nx1c.php" class="link">Return to home page</a>
                </div>
            </div>
            HTML;
            break;
        case "account_created":
            echo <<< HTML
            <div class="login">
                <h1>NX1C</h1>
                <p>One Last Thing</p>
                <br>
                <p>
                    A random security token has been generated for your account. You will need this in order to reset your password or delete your account.
                    Do not lose or share it with anyone!
                </p>
                <br>
                <p>Your Security Token</p>
                <div class="token-wrapper">
                    <p>{$token}</p>
                </div>
                <br>
                <div class="spacer">
                    <a href="login.php" class="link">I have saved my security token</a>
                </div>
            </div>
            HTML;
            break;
    }
    ?>
</div>
</body>
</html>
