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
    <title>User Sign Up</title>
    <link rel="stylesheet" href="resources/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<?php

if (isset($error)) {
    echo '<div class="alert">
            <p>An error occurred during the signup process, please try again later!</p>
        </div>';
}

?>
<div class="login-wrapper">
    <?php

    if (isset($_POST["username"])) {

        $username = $_POST["username"];

        $sql = "SELECT * FROM users WHERE name = '$username'";
        $result = $db->query($sql);

        // only create account if account with that name doesn't exist
        if ($result->num_rows == 0) {

            $password = $_POST["password"];
            // TODO check passwords match
            $token = generate_security_token("abcdefghijklmnopqrstuvwxyz", 50);

            $sql = "INSERT INTO users (name, password, securityToken) VALUES ('$username', '$password', '$token')";

            if ($db->query($sql) === TRUE) {
                echo '<div class="login">
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
                            <p>' . $token . '</p>
                        </div>
                        <br>
                        <div class="spacer">
                            <a href="login.php" class="link">I have saved my security token</a>
                        </div>
                    </div>';
            } else {
                header("Location: err.php");
                exit();
            }

        }
    } else {
        echo '<div class="login">
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
            </div>';
    }

    ?>
</div>
</body>
</html>
