<?php

session_start();

include 'protected/captcha.gateKeeper.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Home</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        .subnav {
            background-color: red;
            color: #fff;
        }
    </style>
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
<div class="subnav">
    <div class="inner">
        <p>NX1C encountered an error! Please check back later to see if it's been resolved.</p>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
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
