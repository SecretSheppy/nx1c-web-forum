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
    <?php
    include 'protected/uiMode.inc.php';
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
        <div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="search.php?search-value=tag1&type=tag">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="post.php?post_id=0">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div><div class="item">
            <div class="inner">
                <h1>Article Title</h1>
                <div class="tags">
                    <a class="tag" href="#">Tag1</a>
                    <a class="tag" href="#">Tag2</a>
                    <a class="tag" href="#">Tag3</a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Urna cursus eget nunc scelerisque viverra mauris. Consectetur a erat nam at lectus urna duis convallis convallis. Et magnis dis parturient montes nascetur ridiculus mus mauris vitae. Lacus vel facilisis volutpat est velit. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. In nisl nisi scelerisque eu ultrices vitae. Urna nec tincidunt praesent semper.</p>
            </div>
            <div class="center">
                <a href="#">See Full Post</a>
            </div>
        </div>
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
