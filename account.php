<?php

session_start();

include 'tools/gate_keeper.inc.php';
gate_keeper(1);

include 'protected/db.inc.php';
include 'protected/login.inc.php';

if (isset($_POST["uiMode"])) {
    $sql = "UPDATE users SET uiMode = '" . $_POST["uiMode"] . "', theme = '" . $_POST["theme"] . "' WHERE userid = '" . $_SESSION["user"]["id"] . "'";
    if ($db->query($sql) === false) {
        header("Location: err.php");
        exit();
    }
}

// TODO - including password in user array could be dangerous but is needed here
$error = login($db, $_SESSION["user"]["name"], $_SESSION["user"]["password"], false);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - My Account</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <?php
    include 'protected/uiMode.inc.php';
    ?>
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
    <form class="search-wrapper" action="search.php" method="get" enctype="application/x-www-form-urlencoded">
        <input name="search-value" placeholder="Search..." minlength="1" type="text"/>
        <input type="hidden" value="text" name="type"/>
        <input type="submit" value="Search" />
    </form>
    <div class="button-wrapper">
        <a href="nx1c.php" class="theme">Home</a>
    </div>
</div>
<div class="subnav">
    <div class="inner">
        <p>Manage you NX1C account</p>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="login-wrapper">
        <div class="button-wrapper">
            <a href="account.php" class="focus"><h2>MANAGE ACCOUNT</h2></a>
            <a href=""><h2>DELETE ACCOUNT</h2></a>
        </div>
        <form class="block-form" action="account.php" method="post" enctype="application/x-www-form-urlencoded">
            <label>Interface Mode</label>
            <select name="uiMode" <?php echo 'value="' . $_SESSION["user"]["uiMode"] . '"'; ?>>
                <option value="0">Light</option>
                <option value="1">Dark</option>
            </select>
            <label>Custom Color Theme</label>
            <input type="color" name="theme" <?php echo 'value="' . $_SESSION["user"]["theme"] . '"'; ?> />
            <input type="submit" value="Update Account Settings" />
            <br>
            <br>
            <a href="reset-password.php">Reset My Password</a>
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
