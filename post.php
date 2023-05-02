<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(0);

include 'protected/db.inc.php';
include 'tools/text_formatting.php';

if (!isset($_GET["postid"]) && $_GET["postid"] != "") {
    header("Location: nx1c.php");
    exit();
}

if (isset($_GET["like"]) && isset($_SESSION["user"])) {
    $sql = "UPDATE posts SET likes = likes + 1 WHERE postid = " . $_GET["postid"];
    if ($db->query($sql) !== true) {
        header("Location: err.php?msg=" . $db->error);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Post</title>
    <link rel="stylesheet" href="resources/css/main.light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php
    include 'tools/ui_mode.inc.php';
    ?>
</head>
<body>
<div class="loader"></div>
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
    <div class="post-wrapper">
        <div class="post">
            <?php

            // getting the post from database
            $postid = $_GET["postid"];
            $sql = "SELECT * FROM posts, users WHERE posts.userid = users.userid AND postid = '$postid'";
            $result = $db->query($sql);

            if ($result->num_rows == 0) {
                header("Location: nx1c.php");
                exit();
            }

            $row = $result->fetch_assoc();

            echo '<div class="username-container">
                    <a class="username-display" href="nx1c.php?userid=' . $row["userid"] . '" id="' . $row["role"] . '"><strong>' . $row["name"] . '</strong></a>
                    <div class="username-container-right">
                        <p><strong>' . $row["likes"] . '</strong> Likes</p>';
            if (isset($_SESSION["user"])) echo '<a class="link" href="?postid=' . $postid . '&like">Like this post</a>';
            echo '</div>
                </div>
                <h1>' . $row["title"] . '</h1>
                <div class="tags">';

            if ($row["tags"] !== null) {
                $tags = explode(", ", $row["tags"]);

                foreach ($tags as $tag) {
                    echo '<a class="tag" href="nx1c.php?tag=' . $tag . '">' . $tag . '</a>';
                }
            }

            echo '</div>';

            ?>
            <?php

            // TODO

            echo print_paragraph($row["content"], true);

            ?>
        </div>
        <h2>Comments</h2>
        <div class="replies">
            <?php

            $post_id = $_GET["postid"];
            $sql = "SELECT * FROM comments WHERE postid = '$post_id'";
            $result = $db->query($sql);

            for ($i = 0; $i < $result->num_rows; $i++) {

                $comment = $result->fetch_assoc();

                $sql = "SELECT name, role FROM users WHERE userid = " . $comment["userid"];
                $user_data = $db->query($sql);
                $user = $user_data->fetch_assoc();

                echo '<div class="reply">
                        <div class="reply-info">
                            <a href="nx1c.php?userid=' . $comment["userid"] . '" id="' . $user["role"] . '">' . $user["name"] . '</a>
                            <a href="reply.php?post_id=0&comment_id=0">reply</a>
                        </div>
                        <div class="reply-text">';

                echo print_paragraph($comment["content"], true);

                echo '</div>';

                echo '</div>';

            }

            ?>
        </div>
        <?php

        if (isset($_SESSION["user"])) {
            echo '<h2>Add a Comment</h2>
                    <form action="comment.php" method="post" enctype="application/x-www-form-urlencoded">
                        <input type="hidden" name="postid" value="' . $post_id . '" />
                        <textarea name="content" placeholder="Comment..." required></textarea>
                        <input value="Comment" type="submit" class="reply-button" />
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
