<?php

session_start();

require('../protected/db.inc.php');

if (isset($_POST["username"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM Users WHERE UserName = '$username' AND UserPassword = '$password' AND UserRole = 'admin'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["super-user"] = $result->fetch_assoc();
        $db->close();
        header("Location: dash.php?panel=host_configuration");
        exit();
    } else {
        $error = true;
    }

}

$db->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C Control Panel</title>
    <link rel="stylesheet" href="../resources/css/login.css" />
    <link rel="icon" href="../resources/images/logo.webp" type="image/x-icon">
    <link rel="shotrcut icon" href="../resources/images/logo.webp">
</head>
<body>
<?php

if (isset($error)) {
    echo '<div class="alert">
            <p>Incorrect login details used</p>
        </div>';
}

?>
<div class="login-wrapper">
    <div class="login">
        <img src="../resources/images/control-panel-logo.webp">
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
    </div>
</div>
</body>
</html>
