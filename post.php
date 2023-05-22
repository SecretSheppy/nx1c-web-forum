<?php

session_start();

include 'tools/load_settings.inc.php';
include 'tools/gate_keeper.php';
gate_keeper(0);

include 'protected/db.inc.php';
include 'tools/text_formatting.php';
include 'tools/SQLGen.php';

$post_id = (int) filter_input(INPUT_GET, "postid", FILTER_DEFAULT);
$sql = new SQLGen();

if ($post_id == null) {
    header("Location: nx1c.php");
    exit();
}

if (isset($_GET["like"]) && isset($_SESSION["user"])) {
    $sql = "UPDATE Posts, Users SET PostLikes = PostLikes + 1, UserLikes = UserLikes + 1 WHERE PostId = $post_id AND Posts.UserId = Users.UserId";
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
        <a href="login.php?follow=' . $post_id . '" class="theme">Login</a>';
        }
        ?>
    </div>
</div>
<?php
include 'tools/subnav.inc.php';
?>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="post-wrapper">
        <div class="post">
            <?php

            // getting the post from database
            $sql = "SELECT * FROM Posts, Users WHERE Posts.UserId = Users.UserId AND Posts.PostId = '$post_id'";
            $result = $db->query($sql);

            if ($result->num_rows == 0) {
                header("Location: nx1c.php");
                exit();
            }

            $row = $result->fetch_assoc();

            echo <<< HTML
            <div class="username-container">
                <a class="username-display" href="nx1c.php?user-id={$row["UserId"]}" id="{$row["UserRole"]}"><strong>{$row["UserName"]}</strong></a>
                <div class="username-container-right">
                    <p><strong>{$row["PostLikes"]}</strong> Likes</p>
            HTML;
            if (isset($_SESSION["user"])) echo '<a class="link" href="?postid=' . $post_id . '&like">Like this post</a>';
            echo <<< HTML
                </div>
            </div>
            <h1>{$row["PostTitle"]}</h1>
            <div class="tags">
            HTML;

            if ($row["PostTags"] !== null) {
                $tags = explode(", ", $row["PostTags"]);

                foreach ($tags as $tag) {
                    echo '<a class="tag" href="nx1c.php?tag=' . $tag . '">' . $tag . '</a>';
                }
            }

            echo '</div>';

            ?>
            <?php

            // TODO

            echo print_paragraph($row["PostContent"], true);

            ?>
        </div>
        <h2>Comments</h2>
        <div class="replies">
            <?php

            $sql = "SELECT * FROM Comments WHERE PostId = '$post_id'";
            $result = $db->query($sql);

            for ($i = 0; $i < $result->num_rows; $i++) {

                $comment = $result->fetch_assoc();

                $sql = "SELECT UserName, UserRole FROM Users WHERE UserId = " . $comment["UserId"];
                $user_data = $db->query($sql);
                $user = $user_data->fetch_assoc();

                echo <<< HTML
                <div class="reply">
                    <div class="reply-info">
                        <a href="nx1c.php?userid={$comment["UserId"]}" id="{$user["UserRole"]}">{$user["UserName"]}</a>
                        <a href="reply.php?post_id=0&comment_id=0">reply</a>
                    </div>
                    <div class="reply-text">
                HTML;
                echo print_paragraph($comment["CommentContent"], true);
                echo '</div></div>';

            }

            ?>
        </div>
        <?php

        if (isset($_SESSION["user"])) {
            echo <<< HTML
            <h2>Add a Comment</h2>
            <form action="comment.php" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="postid" value="{$post_id}" />
                <textarea name="content" placeholder="Comment..." class="space" required></textarea>
                <input value="Comment" type="submit" class="reply-button" />
            </form>
            HTML;
        }

        ?>
    </div>
</div>
<?php
include 'tools/footer.inc.php';
include 'tools/nx1c_footer.inc.php';
?>
</body>
</html>
