<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1);

include 'protected/db.inc.php';

if (isset($_POST["title"])) {
    $title = $_POST["title"];
    if (isset($_POST["tags"])) {
        $tags = $_POST["tags"];
    } else {
        $tags = "";
    }
    $content = $_POST["content"];
    $id = $_SESSION["user"]["id"];
    $sql = "INSERT INTO posts (userid, title, tags, content) VALUES ('$id', '$title', '$tags', '$content')";
    if ($db->query($sql) !== true) {
        $db->close();
        header("Location: err.php");
    } else {
        $db->close();
        header("Location: nx1c.php");
    }
    exit();
}

$db->close();

// TODO be able to upload pictures

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Compose</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php
    include 'tools/ui_mode.inc.php';
    ?>
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
    <div class="button-wrapper">
        <a href="nx1c.php" class="theme">Home</a>
    </div>
</div>
<div class="subnav">
    <div class="inner">
        <p>Write a post</p>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="login-wrapper">
        <form action="compose.php" method="post" enctype="application/x-www-form-urlencoded">
            <input placeholder="Title" name="title" type="text" required />
            <input placeholder="tag, tag" name="tags" type="text"/>
            <textarea placeholder="Post Content..." name="content" required></textarea>
            <input type="submit" value="Publish" class="reply-button" />
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

