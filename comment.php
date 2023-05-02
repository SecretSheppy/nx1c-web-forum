<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1);

include 'protected/db.inc.php';

$post_id = $_POST["postid"];
$user_id = $_SESSION["user"]["id"];
$content = $_POST["content"];
$sql = "INSERT INTO comments (postid, userid, content) VALUES ('$post_id', '$user_id', '$content')";
if ($db->query($sql) === true) {
    header("Location: post.php?postid=" . $_POST["postid"]);
} else {
    header ("Location: err.php");
}
$db->close();
exit();