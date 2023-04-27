<?php

session_start();

include 'tools/gate_keeper.inc.php';
gate_keeper(0);

include 'protected/db.inc.php';

// TODO https://stackoverflow.com/questions/7537377/how-to-include-a-php-variable-inside-a-mysql-statement
// TODO using protected/sql/search.sql

if (isset($_GET["search-value"])) {
    $sql = "SELECT posts.postid, posts.title, posts.content, users.name, users.role FROM posts, users WHERE posts.userid = users.userid AND posts.content LIKE '%" . $_GET["search-value"] . "%' ORDER BY posts.postid DESC";
} else {
    $sql = "SELECT posts.postid, posts.title, posts.content, users.name, users.role FROM posts, users WHERE posts.userid = users.userid ORDER BY posts.postid DESC";
}
$result = $db->query($sql);
$db->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Home</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <?php
    include 'protected/uiMode.inc.php';
    ?>
</head>
<body>
<div class="nav">
    <h1>NX1C</h1>
    <form class="search-wrapper" action="nx1c.php" method="get" enctype="application/x-www-form-urlencoded">
        <input name="search-value" placeholder="Search..." minlength="1" type="text"/>
        <input type="submit" value="Search" />
    </form>
    <div class="button-wrapper">
        <?php
        if (isset($_SESSION["user"])) {
            echo '<a href="account.php" class="theme">' . $_SESSION["user"]["name"] . '</a>';
        } else {
            echo '<a href="signup.php">Sign Up</a>
        <a href="login.php" class="theme">Login</a>';
        }
        ?>
    </div>
</div>
<div class="subnav">
    <div class="inner">
        <a href="nx1c.php">Home</a>
        <a href="nx1c.php?filter=recent">Recent</a>
        <a href="nx1c.php?filter=trending">Trending</a>
        <a href="nx1c.php?filter=most_popular">Most Popular</a>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="content">
        <div class="item" style="min-height: 0; height: fit-content;">
            <div class="inner" style="padding: 30px 20px 30px 20px;">
                <a href="write.php" class="theme">Write A Post</a>
                <a href="write.php">See My Posts</a>
            </div>
        </div>
        <?php

        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                echo '<div class="item">
                        <div class="inner">
                            <h1>' . $row["title"] . '</h1>
                            <div class="tags">
                                <a class="tag" href="search.php?search-value=tag1&type=tag">Tag1</a>
                                <a class="tag" href="#">Tag2</a>
                                <a class="tag" href="#">Tag3</a>
                            </div>
                            <p>' . $row["content"] . '</p>
                        </div>
                        <div class="center">
                            <a href="post.php?post_id=' . $row["postid"] . '">See Full Post</a>
                        </div>
                    </div>';
            }
        } else {
            echo "<p>No Posts Found</p>";
        }
        ?>
    </div>
    <div class="users">
        <div class="inner">
            <!-- default non logged in screen -->
            <div class="login-banner">
                <div class="lb-inner">
                    <h3>Login to see highest rated users</h3>
                    <br>
                    <a href="login.php" class="theme">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pre-footer">
    <div class="inner">
        <div class="prev">
            <a href="#">Previous</a>
        </div>
        <div class="next">
            <a href="#">Next</a>
        </div>
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
