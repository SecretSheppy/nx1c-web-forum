<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1, false);

include 'protected/db.inc.php';
include 'tools/user_login.php';

$username = (string) filter_input(INPUT_POST, "username", FILTER_SANITIZE_ADD_SLASHES);
$password = (string) filter_input(INPUT_POST, "password", FILTER_SANITIZE_ADD_SLASHES);
$follow_url = (int) filter_input(INPUT_GET, "follow", FILTER_SANITIZE_ADD_SLASHES);

if ($username != null) {

    $error = user_login($db, $username, $password, is_null($follow_url));
    if ($error === false) {
        header("Location: post.php?postid=" . $follow_url);
        exit();
    }

}

$db->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="resources/css/login.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<?php

if (isset($error)) {
    echo <<< HTML
    <div class="alert">
        <p>Incorrect login details used</p>
    </div>
    HTML;
}

?>
<div class="login-wrapper">
    <div class="login">
        <h1>NX1C</h1>
        <p>User Login</p>
        <form method="POST" enctype="application/x-www-form-urlencoded">
            <div class="label-wrapper">
                <label for="username">Username</label>
            </div>
            <input id="username" type="text" placeholder="Enter your username" name="username" autocomplete="off" required />
            <div class="label-wrapper">
                <label for="password">Password</label>
            </div>
            <input id="password" type="password" placeholder="Enter your password" name="password" autocomplete="off" required />
            <div class="button-wrapper">
                <input type="reset" value="Cancel" class="spacing" />
                <input type="submit" value="Login" />
            </div>
        </form>
        <div class="spacer">
            <a href="nx1c.php" class="link">Return to home page</a>
        </div>
    </div>
</div>
</body>
</html>