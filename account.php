<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1);

include 'protected/db.inc.php';
include 'tools/user_login.php';
include 'tools/SQLGen.php';

$ui_mode = (int) filter_input(INPUT_POST, "ui-mode", FILTER_DEFAULT);
$theme = filter_input(INPUT_POST, "theme", FILTER_DEFAULT);
$sign_out = (int) filter_input(INPUT_POST, "sign-out", FILTER_DEFAULT);
$user_id = $_SESSION["user"]["id"];
$sql = new SQLGen();

if ($ui_mode != null) {
    $sql->update("Users")
        ->set(array(
            "UserUiMode = $ui_mode",
            "UserTheme = '$theme'"
        ))
        ->where("UserId = $user_id");
    if ($db->query($sql->get_statement()) === false) {
        header("Location: err.php");
        exit();
    }
}

if ($sign_out != null) {
    unset($_SESSION["user"]);
    header("Location: nx1c.php");
    exit();
}

// TODO - including password in user array could be dangerous but is needed here
$error = user_login($db, $_SESSION["user"]["name"], $_SESSION["user"]["password"], false);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - My Account</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php
    include 'tools/ui_mode.inc.php';
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
<?php
include 'tools/subnav.inc.php';
?>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="post-wrapper">
        <h2>My Account</h2>
        <p>Manage your account</p>
        <hr>
        <form class="block-form" method="post" enctype="application/x-www-form-urlencoded">
            <h2>Theme Settings</h2>
            <p>Customise your account with light or dark themes and a custom color</p>
            <div class="label-wrapper">
                <label for="uiMode">Account Theme</label>
            </div>
            <select id="uiMode" name="ui-mode">
                <option value="2" <?php if ($_SESSION["user"]["uiMode"] == 2) echo "selected" ?>>Light</option>
                <option value="1" <?php if ($_SESSION["user"]["uiMode"] == 1) echo "selected" ?>>Dark</option>
            </select>
            <div class="label-wrapper">
                <label for="theme">Account Color Theme</label>
            </div>
            <input type="color" id="theme" name="theme" <?php echo 'value="' . $_SESSION["user"]["theme"] . '"'; ?> />
            <div class="label-wrapper">
                <label for="theme">Update your theme settings</label>
            </div>
            <input type="submit" value="Update" />
            <hr>
        </form>
        <form class="block-form" action="reset-password.php" method="POST" enctype="application/x-www-form-urlencoded">
            <h2>Reset Password</h2>
            <p>Change your password</p>
            <div class="label-wrapper">
                <label for="current-password">Current Password</label>
            </div>
            <input placeholder="Enter Current Password" type="password" id="current-password" name="current-password" required />
            <div class="label-wrapper">
                <label for="new-password">New Password</label>
            </div>
            <input placeholder="Enter New Password" type="password" id="new-password" name="new-password" required />
            <div class="label-wrapper">
                <label for="confirm-new-password">Confirm New Password</label>
            </div>
            <input placeholder="Confirm New Password" type="password" id="confirm-new-password" name="confirm-new-password" required />
            <hr>
        </form>
        <form class="block-form" action="account.php" method="POST" enctype="application/x-www-form-urlencoded">
            <h2>Sign Out</h2>
            <p>Sign out of your account</p>
            <input type="hidden" name="sign-out" value="1" />
            <input type="submit" value="Sign Out" />
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
<?php
include 'tools/nx1c_footer.inc.php';
?>
</body>
</html>
