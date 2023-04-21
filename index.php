<?php

session_start();

require('protected/token.inc.php');

/*
 * captcha page
 * uses resources and css filtering to create a captcha image and then validate the captcha system
 */

if (($_POST["captcha-sequence"] && $_POST["captcha-sequence"] == $_SESSION["captcha-token"]) || (!$_POST["captcha-sequence"] && $_SESSION["captcha-completed"])) {
    $_SESSION["captcha-completed"] = true;
    header("Location: nx1c.php");
    exit();
}

$chars = "abcdefg";
$_SESSION["captcha-token"] = generateToken($chars, strlen($chars));

// return case
function getCase($char) {
    if (strtoupper($char) == $char) {
        return '_upper';
    } else {
        return '_lower';
    }
}

// get images

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Captcha</title>
    <link rel="stylesheet" href="resources/css/captcha.css">
    <link rel="stylesheet" href="resources/css/main.light.css">
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
</div>
<div class="subnav">
    <div class="inner">
        <p class="ignore">NX1C Captcha</p>
    </div>
</div>
<div class="wrapper">
    <div>
        <div style="display: flex; align-items: center; justify-content: center; width: 100%; box-sizing: border-box;">
            <div id="captcha-images">
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][0] . getCase($_SESSION["captcha-token"][0]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"'  ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][1] . getCase($_SESSION["captcha-token"][1]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"' ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][2] . getCase($_SESSION["captcha-token"][2]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"' ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][3] . getCase($_SESSION["captcha-token"][3]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"' ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][4] . getCase($_SESSION["captcha-token"][4]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"' ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][5] . getCase($_SESSION["captcha-token"][5]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5); margin-right: -' . rand(50, 100) . 'px;"' ?>>
                <img <?php echo 'src="resources/captcha/' . $_SESSION["captcha-token"][6] . getCase($_SESSION["captcha-token"][6]) . '.webp" style="transform: rotateZ(' . rand(0, 360) . 'deg); filter: brightness(0.9) invert(.4) sepia(1) hue-rotate(' . rand(0, 2000) . 'deg) saturate(5);"' ?>>
            </div>
        </div>
        <div id="captcha">
            <form method="POST" action="index.php" enctype="application/x-www-form-urlencoded">
                <input placeholder="XXXXXXX" name="captcha-sequence" autocomplete="off" required minlength="7" maxlength="7">
            </form>
        </div>
        <p>Enter the characters from the sequence in the field above</p>
    </div>
</div>
</body>
</html>
