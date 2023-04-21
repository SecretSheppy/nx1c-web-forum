<?php

session_start();

include 'protected/gateKeeper.inc.php';
include 'protected/db.inc.php';

if (isset($_POST["Username"])) {

    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $result = $db->query("SELECT * FROM users WHERE name = '$username'");
    $row = $result->fetch_assoc();

    if ($row["password"] == $password) {
        $_SESSION["user"] = array("name"=>$username, "uiMode"=>$row["uiMode"]);
        $db->close();
        header("Location: nx1c.php");
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
    <title>NX1C - Login</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
</div>
<div class="subnav">
    <div class="inner">
        <p>Login to your existing NX1C account</p>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="login-wrapper">
        <div class="button-wrapper">
            <a href="login.php" class="focus"><h2>LOGIN</h2></a>
            <a href="signup.php"><h2>SIGN UP</h2></a>
        </div>
        <form action="login.php" method="post" enctype="application/x-www-form-urlencoded">
            <?php
            if (isset($error)) {
                echo '<h3 style="color: red; margin-bottom: 10px;">The password you entered was incorrect! Please try again.</h3>';
            }
            ?>
            <input placeholder="Username" name="Username" type="text" required />
            <input placeholder="Password" name="Password" type="password" required />
            <input type="submit" value="Login" />
        </form>
    </div>
</div>
<div class="footer">
    <div class="element">
        <h3>NX1C</h3>
        <a href="#">User Agreement</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Content Policy</a>
        <a href="#">About</a>
    </div>
    <div class="element">
        <h3>Support</h3>
        <a href="#">Delete Account</a>
        <a href="#">General Enquiry</a>
    </div>
    <div class="element">
        <h3>Other Links</h3>
        <a href="http://5wvugn3zqfbianszhldcqz2u7ulj3xex6i3ha3c5znpgdcnqzn24nnid.onion/">The Hidden Wiki</a>
        <a href="http://jaz45aabn5vkemy4jkg4mi4syheisqn2wn2n4fsuitpccdackjwxplad.onion/">OnionLinks</a>
        <a href="http://lldan5gahapx5k7iafb3s4ikijc4ni7gx5iywdflkba5y2ezyg6sjgyd.onion/">OnionShare</a>
        <a href="http://dreadytofatroptsdj6io7l3xptbet6onoyno2yv7jicoxknyazubrad.onion/">Dread</a>
        <a href="https://daunt.link">Daunt</a>
    </div>
</div>
</body>
</html>
