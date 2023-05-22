<?php

/**
 * NX1C Authenticator
 * (POST) user-session-id: <randomly generated id by client side>
 */

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="auth.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<div class="login-wrapper">
    <div class="login">
        <h1>NX1C</h1>
        <p>Activate Your Product</p>
        <p class="no-margin">Activate your product on this device via your MAC address (seen below)</p>
        <div class="token-wrapper">
            <p><?php echo GetMAC(); ?></p>
        </div>
        <form method="POST" enctype="application/x-www-form-urlencoded">
            <div class="button-wrapper">
                <input type="submit" value="Activate for this device" />
            </div>
        </form>
    </div>
</div>
</body>
</html>