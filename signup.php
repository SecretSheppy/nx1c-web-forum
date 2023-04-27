<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1, false);

include 'protected/db.inc.php';
require('tools/generate_security_token.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Sign Up</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
</div>
<div class="subnav">
    <div class="inner">
        <p>Create a new NX1C Account</p>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="login-wrapper">
        <?php

        if (isset($_POST["Username"])) {

            $username = $_POST["Username"];

            $sql = "SELECT * FROM users WHERE name = '$username'";
            $result = $db->query($sql);

            // only create account if account with that name doesn't exist
            if ($result->num_rows == 0) {

                $password = $_POST["Password"];
                $token = generate_security_token("abcdefghijklmnopqrstuvwxyz", 50);

                $sql = "INSERT INTO users (name, password, securityToken) VALUES ('$username', '$password', '$token')";

                if ($db->query($sql) === TRUE) {
                    echo '<h1>One Last Thing</h1>
                    <br>
                    <h3>
                        To ensure anonymity on the service NX1C does not use any personal information to identify users. To secure your account and
                        allow you to delete or recover it you have now been issued a security token. We advise that you keep this safe and do not share it
                        with anyone. If you lose your security token you will not be able to recover or delete your account.
                    </h3>
                    <br>
                    <h2>Your Security Token</h2>
                    <div class="token-wrapper">
                        <p>' . $token . '</p>
                    </div>
                    <br>
                    <a href="login.php" class="reply-button">I have saved my security token</a>';
                } else {
                    header("Location: err.php");
                    exit();
                }

            } else {

                echo '<div class="button-wrapper">
                <a href="login.php"><h2>LOGIN</h2></a>
                <a href="signup.php" class="focus"><h2>SIGN UP</h2></a>
                </div><form action="signup.php" method="POST" enctype="application/x-www-form-urlencoded">
                <h3 style="color: red; margin-bottom: 10px;">Sorry, the name: ' . $username . ' is already taken. Please choose another one and try again.</h3>
                <input placeholder="Username" name="Username" type="text" required/>
                <input placeholder="Password" type="password" name="Password" required/>
                <input type="submit" value="Login"/>
                </form>';

            }

            $db->close();
        } else {
            echo '<div class="button-wrapper">
            <a href="login.php"><h2>LOGIN</h2></a>
            <a href="signup.php" class="focus"><h2>SIGN UP</h2></a>
            </div><form action="signup.php" method="POST" enctype="application/x-www-form-urlencoded">
            <input placeholder="Username" name="Username" type="text" required/>
            <input placeholder="Password" type="password" name="Password" required/>
            <input type="submit" value="Login"/>
            </form>';
        }

        ?>
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
