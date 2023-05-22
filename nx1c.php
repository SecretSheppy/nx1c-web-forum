<?php

session_start();

include 'tools/load_settings.inc.php';
include 'tools/gate_keeper.php';
gate_keeper(0);

include 'protected/db.inc.php';
include 'tools/text_formatting.php';
include 'tools/SQLGen.php';
include 'tools/page_buttons.inc.php';

$search_value = (string) filter_input(INPUT_GET, "search-value", FILTER_SANITIZE_ADD_SLASHES);
$user_id = (int) filter_input(INPUT_GET, "user-id", FILTER_DEFAULT);
$tag = (string) filter_input(INPUT_GET, "tag", FILTER_SANITIZE_ADD_SLASHES);
$next_post_block = (int) filter_input(INPUT_GET, "post-block", FILTER_DEFAULT);

if ($search_value != null) {
    // TODO - finish the generating sql process.
    $sql = new SQLGen();
    $sql->select_array(array(
        "Posts.PostId",
        "Posts.PostTitle",
        "Posts.PostContent",
        "Posts.PostLikes",
        "Users.UserName",
        "Users.UserRole",
        "Users.UserId"
    ))
        ->from_array(array(
        "Posts",
        "Users"
    ))
        ->where("Posts.UserId = Users.UserId")
        ->order_by("Posts.PostId DESC")
        ->limit(30);
    $sql_statement = $sql->get_statement();
    unset($sql);
    $sql = "SELECT Posts.PostId, Posts.PostTitle, Posts.PostContent, Posts.PostTags, Posts.PostLikes, Users.UserName, Users.UserRole, Users.UserId FROM Posts, Users WHERE Posts.UserId = Users.UserId AND Posts.PostContent LIKE '%$search_value%' ORDER BY Posts.PostId DESC LIMIT 30";
} else if ($user_id != null) {
    $sql = "SELECT Posts.PostId, Posts.PostTitle, Posts.PostContent, Posts.PostTags, Posts.PostLikes, Users.UserName, Users.UserRole, Users.UserId FROM Posts, Users WHERE Posts.UserId = Users.UserId AND Users.UserId = $user_id ORDER BY Posts.PostId DESC LIMIT 30";
} else if ($tag != null) {
    $sql = "SELECT Posts.PostId, Posts.PostTitle, Posts.PostContent, Posts.PostTags, Posts.PostLikes, Users.UserName, Users.UserRole, Users.UserId FROM Posts, Users WHERE Posts.UserId = Users.UserId AND Posts.PostTags LIKE '%$tag%' ORDER BY Posts.PostId DESC LIMIT 30";
} else if ($next_post_block != null) {
    $sql = "SELECT Posts.PostId, Posts.PostTitle, Posts.PostContent, Posts.PostTags, Posts.PostLikes, Users.UserName, Users.UserRole, Users.UserId FROM Posts, Users WHERE Posts.UserId = Users.UserId AND Posts.PostId < $next_post_block ORDER BY Posts.PostId DESC LIMIT 30";
} else {
    $sql = "SELECT Posts.PostId, Posts.PostTitle, Posts.PostContent, Posts.PostTags, Posts.PostLikes, Users.UserName, Users.UserRole, Users.UserId FROM Posts, Users WHERE Posts.UserId = Users.UserId ORDER BY Posts.PostId DESC LIMIT 30";
}

$result = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Home</title>
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
<?php
include 'tools/subnav.inc.php';
?>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="content">
        <?php

        if (isset($_SESSION["user"])) {
            echo <<< HTML
            <div class="item" style="min-height: 0; height: fit-content;">
                <div class="inner" style="padding: 30px 20px 30px 20px;">
                    <a href="compose.php" class="theme">Write A Post</a>
                    <a href="nx1c.php?user-id={$_SESSION["user"]["id"]}">See My Posts</a>
                </div>
            </div>
            HTML;
        }

        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {

                $row = $result->fetch_assoc();
                $paragraph_data = print_paragraph($row["PostContent"]);
                $tags_data = "";

                if ($i == $result->num_rows - 1) {
                    $last_post_id = $row["PostId"];
                }

                if ($row["tags"] !== null) {
                    foreach (explode(", ", $row["tags"]) as $tag) {
                        $tags_data .= '<a class="tag" href="nx1c.php?tag=' . $tag . '">' . $tag . '</a>';
                    }
                }

                echo <<< HTML
                <div class="item">
                    <div class="inner">
                        <div class="username-container">
                            <a class="username-display" href="nx1c.php?user-id={$row["UserId"]}" id="{$row["UserRole"]}"><strong>{$row["UserName"]}</strong></a>
                            <div class="username-container-right">
                                <p><strong>{$row["PostLikes"]}</strong> Likes</p>
                            </div>
                        </div>
                        <h1>{$row["PostTitle"]}</h1>
                        <div class="tags">
                        {$tags_data}
                        </div>
                        {$paragraph_data}
                    </div>
                    <div class="center">
                        <a href="post.php?postid={$row["PostId"]}">See Full Post</a>
                    </div>
                </div>
                HTML;
            }
        } else {
            echo <<< HTML
            <div class="item">
                <div class="inner">
                    <h1>Sorry, No posts found :(</h1>
                    <p>No posts could be found for the user or search query you made.</p>
                </div>
            </div>
            HTML;
        }
        ?>
    </div>
    <div class="users">
        <div class="inner">
            <?php

            if (!isset($_SESSION["user"])) {
                echo <<< HTML
                <div class="login-banner">
                    <div class="lb-inner">
                        <h3>Login to see the highest rated users</h3>
                        <br>
                        <a href="login.php" class="theme">Login</a>
                    </div>
                </div>
                HTML;
            } else {
                $sql = "SELECT UserId, UserName, UserLikes FROM Users ORDER BY UserLikes DESC LIMIT 8";
                $result = $db->query($sql);
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $row = $result->fetch_assoc();
                    echo <<< HTML
                    <div class="user">
                        <div>
                            <h3>{$row["UserName"]}</h3> 
                            <p>{$row["UserLikes"]} Likes</p>                    
                        </div>
                        <a href="nx1c.php?user-id={$row["UserId"]}">View</a>
                    </div>
                    HTML;
                }

            }

            ?>
        </div>
    </div>
</div>
<?php
render_pages_buttons($next_post_block, $last_post_id);
include 'tools/footer.inc.php';
include 'tools/nx1c_footer.inc.php';
?>
</body>
</html>

<?php

$db->close();
