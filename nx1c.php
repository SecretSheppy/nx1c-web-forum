<?php

session_start();

include 'tools/load_settings.inc.php';
include 'tools/gate_keeper.php';
gate_keeper(0);

include 'protected/db.inc.php';
include 'tools/text_formatting.php';
include 'tools/SQLGen.php';

$search_value = (string) filter_input(INPUT_GET, "search-value", FILTER_SANITIZE_ADD_SLASHES);
$user_id = (int) filter_input(INPUT_GET, "user-id", FILTER_DEFAULT);
$tag = (string) filter_input(INPUT_GET, "tag", FILTER_SANITIZE_ADD_SLASHES);
$next_post_block = (int) filter_input(INPUT_GET, "next-post-block", FILTER_DEFAULT);

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
    $sql = "SELECT posts.postid, posts.title, posts.content, posts.tags, posts.likes, users.name, users.role, users.userid FROM posts, users WHERE posts.userid = users.userid AND posts.content LIKE '%$search_value%' ORDER BY posts.postid DESC LIMIT 30";
} else if ($user_id != null) {
    $sql = "SELECT posts.postid, posts.title, posts.content, posts.tags, posts.likes, users.name, users.role, users.userid FROM posts, users WHERE posts.userid = users.userid AND users.userid = $user_id ORDER BY posts.postid DESC LIMIT 30";
} else if ($tag != null) {
    $sql = "SELECT posts.postid, posts.title, posts.content, posts.tags, posts.likes, users.name, users.role, users.userid FROM posts, users WHERE posts.userid = users.userid AND posts.tags LIKE '%$tag%' ORDER BY posts.postid DESC LIMIT 30";
} else if ($next_post_block != null) {
    $sql = "SELECT posts.postid, posts.title, posts.content, posts.tags, posts.likes, users.name, users.role, users.userid FROM posts, users WHERE posts.userid = users.userid AND posts.postid < $next_post_block ORDER BY posts.postid DESC LIMIT 30";
} else {
    $sql = "SELECT posts.postid, posts.title, posts.content, posts.tags, posts.likes, users.name, users.role, users.userid FROM posts, users WHERE posts.userid = users.userid ORDER BY posts.postid DESC LIMIT 30";
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
                $paragraph_data = print_paragraph($row["content"]);
                $tags_data = "";

                if ($i == $result->num_rows - 1) {
                    $last_post_id = $row["postid"];
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
                            <a class="username-display" href="nx1c.php?user-id={$row["userid"]}" id="{$row["role"]}"><strong>{$row["name"]}</strong></a>
                            <div class="username-container-right">
                                <p><strong>{$row["likes"]}</strong> Likes</p>
                            </div>
                        </div>
                        <h1>{$row["title"]}</h1>
                        <div class="tags">
                        {$tags_data}
                        </div>
                        {$paragraph_data}
                    </div>
                    <div class="center">
                        <a href="post.php?postid={$row["postid"]}">See Full Post</a>
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
                $sql = "SELECT userid, name, upvotes FROM users ORDER BY upvotes DESC LIMIT 8";
                $result = $db->query($sql);
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $row = $result->fetch_assoc();
                    echo <<< HTML
                    <div class="user">
                        <div>
                            <h3>{$row["name"]}</h3> 
                            <p>{$row["upvotes"]} Likes</p>                    
                        </div>
                        <a href="nx1c.php?user-id={$row["userid"]}">View</a>
                    </div>
                    HTML;
                }

            }

            ?>
        </div>
    </div>
</div>
<div class="pre-footer">
    <div class="inner">
        <div class="prev">
            <a <?php if ($next_post_block != null) echo 'href="?next-post-block=' . $next_post_block + 30 . '"'; ?>>Previous</a>
        </div>
        <div class="next">
            <a <?php echo "href='?next-post-block=$last_post_id'" ?>>Next</a>
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
<?php
include 'tools/nx1c_footer.inc.php';
?>
</body>
</html>

<?php

$db->close();
