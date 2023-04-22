<?php

session_start();

include 'protected/captcha.gateKeeper.inc.php';

// format for adding user data
if ($_SESSION["User"] != "undefined") {
    // Do user setup here
} else {
    // do regular setup here
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C - Post</title>
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
        <a href="#">Sign Up</a>
        <a href="login.php" class="theme">Login</a>
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
            <h1>Article Title</h1>
            <div class="tags">
                <a class="tag" href="search.php?search-value=tag1&type=tag">Tag1</a>
                <a class="tag" href="#">Tag2</a>
                <a class="tag" href="#">Tag3</a>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque aliquam vestibulum morbi blandit cursus risus at. Tristique risus nec feugiat in. Tempor commodo ullamcorper a lacus vestibulum. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Placerat vestibulum lectus mauris ultrices eros in cursus turpis. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Volutpat consequat mauris nunc congue nisi. Convallis convallis tellus id interdum velit laoreet. Erat nam at lectus urna duis convallis. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Sed vulputate odio ut enim. Neque egestas congue quisque egestas diam in arcu cursus. Non blandit massa enim nec dui. Sed cras ornare arcu dui vivamus. Ornare suspendisse sed nisi lacus sed.
                <br>
                <br>
                Dignissim sodales ut eu sem integer vitae justo eget magna. Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus. Arcu ac tortor dignissim convallis. Interdum velit euismod in pellentesque massa placerat duis ultricies lacus. Tempus imperdiet nulla malesuada pellentesque elit eget. Neque sodales ut etiam sit amet nisl purus in. Imperdiet sed euismod nisi porta lorem mollis. Porta nibh venenatis cras sed felis eget velit aliquet sagittis. Scelerisque viverra mauris in aliquam sem fringilla ut morbi tincidunt. Quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Eu scelerisque felis imperdiet proin fermentum.
                <br>
                <br>
                Augue eget arcu dictum varius duis at consectetur lorem donec. Quis eleifend quam adipiscing vitae. Euismod elementum nisi quis eleifend quam adipiscing vitae proin. Cras sed felis eget velit aliquet sagittis id. Sagittis orci a scelerisque purus semper eget. Nunc lobortis mattis aliquam faucibus. At elementum eu facilisis sed odio morbi quis. Adipiscing diam donec adipiscing tristique risus. Sed risus ultricies tristique nulla aliquet enim tortor at. Cursus eget nunc scelerisque viverra mauris. Non odio euismod lacinia at quis.
                <br>
                <br>
                Augue interdum velit euismod in pellentesque massa placerat duis ultricies. Risus quis varius quam quisque id diam vel. A iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Sollicitudin ac orci phasellus egestas. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Aliquet lectus proin nibh nisl condimentum id venenatis a. Non pulvinar neque laoreet suspendisse interdum consectetur. Amet commodo nulla facilisi nullam vehicula. Magna sit amet purus gravida quis blandit turpis cursus in. Sed libero enim sed faucibus turpis in eu mi bibendum. Lorem ipsum dolor sit amet consectetur.
                <br>
                <br>
                Tempus iaculis urna id volutpat lacus laoreet non. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Quis eleifend quam adipiscing vitae proin sagittis nisl. Convallis tellus id interdum velit laoreet id donec ultrices. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Mauris nunc congue nisi vitae suscipit tellus mauris. Ante in nibh mauris cursus mattis. Arcu odio ut sem nulla pharetra diam sit amet nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse potenti. Nulla porttitor massa id neque aliquam vestibulum morbi. Auctor augue mauris augue neque gravida in fermentum. Posuere urna nec tincidunt praesent semper. Habitant morbi tristique senectus et. Elit sed vulputate mi sit. A scelerisque purus semper eget duis at. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. At quis risus sed vulputate odio ut enim blandit volutpat. Adipiscing elit ut aliquam purus sit.
                <br>
                <br>
                see link: <a href="#">https://www.google.com/</a>
            </p>
        </div>
        <h2>Replies</h2>
        <div class="replies">
            <div class="reply">
                <p id="admin">Username</p>
                <div class="reply-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis posuere morbi leo urna molestie at elementum eu. Interdum varius sit amet mattis vulputate enim nulla. Purus gravida quis blandit turpis cursus. Vestibulum lorem sed risus ultricies tristique nulla aliquet. Aliquet enim tortor at auctor urna nunc id cursus. Egestas maecenas pharetra convallis posuere morbi leo. Aliquam purus sit amet luctus venenatis. Condimentum id venenatis a condimentum vitae sapien pellentesque habitant morbi. Congue mauris rhoncus aenean vel elit. Fringilla ut morbi tincidunt augue interdum velit euismod in pellentesque. Neque volutpat ac tincidunt vitae semper quis lectus. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Scelerisque eleifend donec pretium vulputate sapien. Mollis nunc sed id semper risus in. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Semper feugiat nibh sed pulvinar proin gravida.</p>
                </div>
                <div class="reply">
                    <p id="mod">Username</p>
                    <div class="reply-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat in fermentum posuere urna nec tincidunt. Vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor. Et malesuada fames ac turpis egestas. Ipsum dolor sit amet consectetur adipiscing elit ut. In arcu cursus euismod quis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Nunc faucibus a pellentesque sit. Amet facilisis magna etiam tempor orci. In cursus turpis massa tincidunt dui ut ornare lectus. Suscipit adipiscing bibendum est ultricies integer quis. Auctor augue mauris augue neque gravida in fermentum et. Platea dictumst vestibulum rhoncus est pellentesque. Duis at consectetur lorem donec massa sapien faucibus. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Pharetra vel turpis nunc eget lorem dolor sed. Purus sit amet luctus venenatis lectus magna fringilla urna.
                            <br>
                            <br>
                            see link: <a href="#">https://www.google.com/</a>
                        </p>
                    </div>
                    <div class="reply">
                        <p>Username</p>
                        <div class="reply-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi nullam vehicula ipsum a arcu cursus vitae congue. Sed viverra ipsum nunc aliquet bibendum enim facilisis. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Tellus mauris a diam maecenas sed enim ut sem. Porta non pulvinar neque laoreet suspendisse interdum consectetur. Facilisis sed odio morbi quis. Id ornare arcu odio ut sem nulla. Morbi enim nunc faucibus a pellentesque sit amet porttitor eget. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Bibendum est ultricies integer quis auctor elit sed vulputate mi. Accumsan lacus vel facilisis volutpat est velit egestas dui. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Tincidunt id aliquet risus feugiat in. Pharetra sit amet aliquam id diam maecenas. Amet volutpat consequat mauris nunc congue nisi.</p>
                        </div>
                        <div class="reply">
                            <p>Username</p>
                            <div class="reply-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet cursus sit amet dictum sit amet justo. Sit amet justo donec enim. Tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Vel fringilla est ullamcorper eget nulla facilisi. Nulla pharetra diam sit amet nisl suscipit adipiscing. Leo urna molestie at elementum eu facilisis sed odio morbi. At tellus at urna condimentum mattis pellentesque. Pulvinar elementum integer enim neque volutpat. Sit amet purus gravida quis blandit turpis cursus. Eu feugiat pretium nibh ipsum consequat nisl vel. Tortor dignissim convallis aenean et tortor at risus. Sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit. Pellentesque elit ullamcorper dignissim cras tincidunt. Adipiscing commodo elit at imperdiet dui accumsan. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="reply">
                <p>Username</p>
                <div class="reply-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id consectetur purus ut faucibus pulvinar elementum. Eros donec ac odio tempor orci dapibus ultrices. Massa ultricies mi quis hendrerit. <a href="#">https://www.google.com/</a> Tristique nulla aliquet enim tortor at auctor urna nunc id. Volutpat diam ut venenatis tellus in metus vulputate eu scelerisque. Suspendisse sed nisi lacus sed viverra tellus in. Id cursus metus aliquam eleifend. Quis lectus nulla at volutpat. Justo laoreet sit amet cursus sit amet dictum.</p>
                </div>
                <div class="reply">
                    <p>Username</p>
                    <div class="reply-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. In mollis nunc sed id semper. Tellus molestie nunc non blandit massa enim nec dui. Cursus eget nunc scelerisque viverra mauris in aliquam. Proin nibh nisl condimentum id venenatis a condimentum. Euismod lacinia at quis risus sed. Vitae tortor condimentum lacinia quis vel eros donec ac. Sed odio morbi quis commodo odio aenean sed adipiscing diam. Nascetur ridiculus mus mauris vitae. Dictum varius duis at consectetur lorem donec. Mollis nunc sed id semper risus in hendrerit. Ut aliquam purus sit amet luctus venenatis lectus. Arcu felis bibendum ut tristique et egestas. Sed velit dignissim sodales ut eu sem integer vitae justo. Ipsum dolor sit amet consectetur. Porta non pulvinar neque laoreet. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi.</p>
                    </div>
                </div>
            </div><div class="reply">
                <p>Username</p>
                <div class="reply-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed risus pretium quam vulputate dignissim suspendisse in est ante. In mollis nunc sed id semper. Tellus molestie nunc non blandit massa enim nec dui. Cursus eget nunc scelerisque viverra mauris in aliquam. Proin nibh nisl condimentum id venenatis a condimentum. Euismod lacinia at quis risus sed. Vitae tortor condimentum lacinia quis vel eros donec ac. Sed odio morbi quis commodo odio aenean sed adipiscing diam. Nascetur ridiculus mus mauris vitae. Dictum varius duis at consectetur lorem donec. Mollis nunc sed id semper risus in hendrerit. Ut aliquam purus sit amet luctus venenatis lectus. Arcu felis bibendum ut tristique et egestas. Sed velit dignissim sodales ut eu sem integer vitae justo. Ipsum dolor sit amet consectetur. Porta non pulvinar neque laoreet. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi.</p>
                </div>
                <div class="reply">
                    <p>Username</p>
                    <div class="reply-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Pharetra pharetra massa massa ultricies mi. Sagittis eu volutpat odio facilisis mauris. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. In fermentum posuere urna nec. Id volutpat lacus laoreet non curabitur gravida arcu. Est velit egestas dui id. Est lorem ipsum dolor sit amet. Faucibus pulvinar elementum integer enim. Eget arcu dictum varius duis at consectetur lorem donec. Vitae tempus quam pellentesque nec. Est ultricies integer quis auctor elit sed vulputate. Cum sociis natoque penatibus et magnis dis parturient montes nascetur. Pharetra diam sit amet nisl suscipit adipiscing. Risus in hendrerit gravida rutrum quisque non tellus. Amet cursus sit amet dictum sit amet justo donec.</p>
                    </div>
                    <div class="reply">
                        <p>Username</p>
                        <div class="reply-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit eget gravida cum sociis natoque penatibus. Cras semper auctor neque vitae tempus quam pellentesque nec. Velit euismod in pellentesque massa placerat duis ultricies. Sit amet tellus cras adipiscing enim. Proin libero nunc consequat interdum. Malesuada fames ac turpis egestas maecenas. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper. Et netus et malesuada fames. Sapien eget mi proin sed.</p>
                        </div>
                    </div>
                </div>
            </div><div class="reply">
                <p>Username</p>
                <div class="reply-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing commodo elit at imperdiet dui accumsan sit amet. Vel elit scelerisque mauris pellentesque pulvinar. Eget egestas purus viverra accumsan in nisl nisi. Sit amet mattis vulputate enim nulla aliquet porttitor. Dignissim enim sit amet venenatis urna cursus eget nunc. Imperdiet dui accumsan sit amet. Bibendum at varius vel pharetra vel. Justo nec ultrices dui sapien eget. Ultrices neque ornare aenean euismod elementum nisi quis eleifend quam. Purus sit amet luctus venenatis lectus magna. Pulvinar etiam non quam lacus. Congue eu consequat ac felis. Sed viverra tellus in hac.</p>
                </div>
                <div class="reply">
                    <p>Username</p>
                    <div class="reply-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In hac habitasse platea dictumst vestibulum. Neque volutpat ac tincidunt vitae semper quis. Sit amet risus nullam eget felis eget nunc. Scelerisque viverra mauris in aliquam. Rhoncus urna neque viverra justo. Ornare massa eget egestas purus viverra accumsan in. Tempus imperdiet nulla malesuada pellentesque elit. Sed arcu non odio euismod. In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Leo integer malesuada nunc vel risus. Neque volutpat ac tincidunt vitae semper quis lectus nulla at. Viverra accumsan in nisl nisi. Donec enim diam vulputate ut pharetra sit amet aliquam.</p>
                    </div>
                    <div class="reply">
                        <p>Username</p>
                        <div class="reply-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit eget gravida cum sociis natoque penatibus. Cras semper auctor neque vitae tempus quam pellentesque nec. Velit euismod in pellentesque massa placerat duis ultricies. Sit amet tellus cras adipiscing enim. Proin libero nunc consequat interdum. Malesuada fames ac turpis egestas maecenas. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper. Et netus et malesuada fames. Sapien eget mi proin sed.</p>
                        </div>
                    </div>
                </div>
                <div class="reply">
                    <p>Username</p>
                    <div class="reply-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In hac habitasse platea dictumst vestibulum. Neque volutpat ac tincidunt vitae semper quis. Sit amet risus nullam eget felis eget nunc. Scelerisque viverra mauris in aliquam. Rhoncus urna neque viverra justo. Ornare massa eget egestas purus viverra accumsan in. Tempus imperdiet nulla malesuada pellentesque elit. Sed arcu non odio euismod. In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Leo integer malesuada nunc vel risus. Neque volutpat ac tincidunt vitae semper quis lectus nulla at. Viverra accumsan in nisl nisi. Donec enim diam vulputate ut pharetra sit amet aliquam.</p>
                    </div>
                </div>
            </div>
        </div>
        <h2>Reply</h2>
        <form action="reply.php" method="post" enctype="application/x-www-form-urlencoded">
            <textarea name="reply-text" placeholder="Reply..." required></textarea>
            <input value="Submit Reply" type="submit" class="reply-button" />
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
