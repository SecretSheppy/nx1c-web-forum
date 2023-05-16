<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1);

include 'protected/db.inc.php';
include 'tools/SQLGen.php';

$title = (string) filter_input(INPUT_POST, "title", FILTER_SANITIZE_ADD_SLASHES);
$tags = (string) filter_input (INPUT_POST, "tags", FILTER_SANITIZE_ADD_SLASHES);
$content = (string) filter_input(INPUT_POST, "content", FILTER_SANITIZE_ADD_SLASHES);
$id = $_SESSION["user"]["id"];

if ($title != null) {
    $sql = new SQLGen();
    $sql->insert_into("posts")
        ->fields(array(
            "userid",
            "title",
            "tags",
            "content"
        ))
        ->values(array(
            $id,
            $title,
            $tags,
            $content
        ));
    if ($db->query($sql->get_statement()) !== true) {
        $db->close();
        header("Location: err.php");
    } else {
        $db->close();
        header("Location: nx1c.php");
    }
    exit();
}

$db->close();

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
        <h2>Write a post</h2>
        <p>
            Write a publicly viewable post (this will be permanently tied to your account and cannot be deleted,
            even if your account is deleted
        </p>
        <form action="compose.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="label-wrapper">
                <label for="title">Post Title</label>
            </div>
            <input placeholder="Enter Post Title" id="title" name="title" type="text" required />
            <div class="label-wrapper">
                <label for="tags">Post Tags (enter tags seperated by commas i.e. tag, tag, tag)</label>
            </div>
            <input placeholder="Enter Post Tags" id="tags" name="tags" type="text"/>
            <div class="label-wrapper">
                <label for="content">Post Content</label>
            </div>
            <textarea placeholder="Enter Post Content" id="content" name="content" required></textarea>
            <input type="submit" value="Publish" class="reply-button space" />
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

