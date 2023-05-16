<?php

session_start();

if (!isset($_SESSION["super-user"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION["nx1c.xml"])) {
    $_SESSION["nx1c.xml"] = simplexml_load_file("../about/nx1c.xml");
}

if (!isset($_GET["panel"])) {
    header("Location: dash.php?panel=host_configuration");#
    exit();
} else {
    $panel = $_GET["panel"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C Control Panel</title>
    <link rel="stylesheet" href="../resources/css/main.light.css" />
    <link rel="icon" href="../resources/images/logo.webp" type="image/x-icon">
    <link rel="shotrcut icon" href="../resources/images/logo.webp">
</head>
<body>
<div class="loader"></div>
<div class="nav">
    <img src="../resources/images/control-panel-logo.webp">
</div>
<div class="subnav">
    <div class="inner">
        <a href="?panel=host_configuration">Host Configuration</a>
        <a href="?panel=users">Users</a>
        <a href="#">Posts</a>
        <a href="#">Comments</a>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="post-wrapper">
        <?php
        include $panel . ".inc.php";
        ?>
    </div>
</div>
</body>
</html>
