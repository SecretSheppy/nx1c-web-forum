<?php

session_start();

if (!isset($_SESSION["super-user"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION["nx1c.xml"])) {
    $_SESSION["nx1c.xml"] = simplexml_load_file("../about/nx1c.xml");
}

if (!isset($_GET["panel"])) {
    header("Location: dash.php?panel=host_config");#
    exit();
} else {
    $panel = $_GET["panel"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NX1C Control Panel - Dashboard</title>
    <link rel="stylesheet" href="../resources/css/main.light.css" />
</head>
<body>
<div class="loader"></div>
<div class="nav">
    <img src="../resources/images/control-panel-logo.webp">
</div>
<div class="subnav">
    <div class="inner">
        <a href="?tab=service_settings">Host Configuration</a>
        <a href="#">Users</a>
        <a href="#">Posts</a>
        <a href="#">Comments</a>
    </div>
</div>
<div class="navblocker"></div>
<div class="main-wrapper">
    <div class="post-wrapper"
        <?php
        if ($panel == "host_config") {
            echo 'style="display: block;"';
        } else {
            echo 'style="display: none;';
        }
        ?>>
        <h2>Host Configuration</h2>
        <p>Manage and customise the default settings of your NX1C installation</p>
            <form method="get" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="panel" value="host_config" />
            <hr>
            <h2>Branding</h2>
            <p>Customise the branding of your NX1C installation</p>
            <div class="label-wrapper">
                <label for="type">Type</label>
            </div>
            <select name="type" id="type">
                <option value="text">Text</option>
                <option value="image">Image</option>
            </select>
            <div class="label-wrapper">
                <label for="branding">Text/Url</label>
            </div>
            <input placeholder="Enter brand name or image url" name="branding" id="branding" <?php echo 'value="' . $_SESSION["nx1c.xml"]->host->branding->text . '"'; ?> />
            <hr>
            <h2>About</h2>
            <p>Add information about your brand. This information is not publicly accessible through NX1C but can be accessed through the api.</p>
            <div class="label-wrapper">
                <label for="hostname">Hostname</label>
            </div>
            <input placeholder="Enter Hostname" name="hostname" id="hostname" <?php echo 'value="' . $_SESSION["nx1c.xml"]->host->about->hostname . '"'; ?> />
            <div class="label-wrapper">
                <label for="description">Host Description</label>
            </div>
            <textarea name="description" id="description" placeholder="Enter Host Description"><?php echo $_SESSION["nx1c.xml"]->host->about->description; ?></textarea>
            <div class="label-wrapper">
                <label for="email">Contact Email</label>
            </div>
            <input type="email" placeholder="Enter Contact Email" name="email" id="email" <?php echo 'value="' . $_SESSION["nx1c.xml"]->host->about->contact . '"'; ?>/>
            <hr>
            <h2>Settings</h2>
            <p>General settings for your NX1C installation</p>
            <div class="label-wrapper">
                <label for="captcha">Run captcha on new user</label>
            </div>
            <select id="captcha" name="captcha">
                <option value="on">On</option>
                <option value="off">Off</option>
            </select>
            <div class="label-wrapper">
                <label for="post-limit">Post Render Limit</label>
            </div>
            <input placeholder="Enter Post Render Limit" type="number" <?php echo 'value="' . $_SESSION["nx1c.xml"]->settings->postlimit . '"'; ?> name="post-limit" id="post-limit" />
            <div class="label-wrapper">
                <label for="post-character-limit">Post Character Limit</label>
            </div>
            <input placeholder="Enter Post Character Limit" type="number" <?php echo 'value="' . $_SESSION["nx1c.xml"]->settings->postcharlimit . '"'; ?> name="post-character-limit" id="post-character-limit" />
            <div class="label-wrapper">
                <label for="comment-character-limit">Comment Character Limit</label>
            </div>
            <input placeholder="Enter Comment Character Limit" type="number" <?php echo 'value="' . $_SESSION["nx1c.xml"]->settings->commentcharlimit . '"'; ?> name="comment-character-limit" id="comment-character-limit" />
            <div class="label-wrapper">
                <label for="default-ui-mode">Default UI Mode</label>
            </div>
            <select name="default-ui-mode" id="default-ui-mode">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
            <div class="label-wrapper">
                <label for="default-theme">Default Theme</label>
            </div>
            <input type="color" name="default-theme" id="default-theme" <?php echo 'value="' . $_SESSION["nx1c.xml"]->settings->defaulttheme . '"'; ?> />
            <hr>
            <h2>Filtered Words</h2>
            <p>Enable filtering of specific words</p>
            <table>
                <tr>
                    <th>Source Word</th>
                    <th>Replacement Word</th>
                    <th>Remove</th>
                </tr>
                <?php

                foreach ($_SESSION["nx1c.xml"]->settings->filter->word as $word) {
                    echo '<tr>
                            <td>' . $word->raw . '</td>
                            <td>' . $word->replacement . '</td>
                            <td><input type="checkbox" name="remove[]" value="' . $word->raw . '" /></td>
                        </tr>';
                }

                ?>
            </table>
            <div class="button-wrapper">
                <input value="Update Configuration" type="submit" />
            </div>
        </form>
    </div>
</div>
</body>
</html>
